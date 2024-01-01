/* ------------------------------------------------------------------------------
 *
 *  # Basic datatables
 *
 *  Demo JS code for datatable_basic.html page
 *
 * ---------------------------------------------------------------------------- */

// Setup module
// ------------------------------

var DatatableBasic = (function () {
    //
    // Setup module components
    //

    // Basic Datatable examples
    var _componentDatatableBasic = function () {
        if (!$().DataTable) {
            console.warn("Warning - datatables.min.js is not loaded.");
            return;
        }

        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [
                {
                    orderable: false,
                    width: 100,
                    targets: [5],
                },
            ],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: "<span>Filter:</span> _INPUT_",
                searchPlaceholder: "Type to filter...",
                lengthMenu: "<span>Show:</span> _MENU_",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: $("html").attr("dir") == "rtl" ? "&larr;" : "&rarr;",
                    previous:
                        $("html").attr("dir") == "rtl" ? "&rarr;" : "&larr;",
                },
            },
        });

        // Basic datatable

        if (!$(".isActive").length) {
            $(".datatable-basic").DataTable();
        }

        // Alternative pagination
        $(".datatable-pagination").DataTable({
            pagingType: "simple",
            language: {
                paginate: {
                    next:
                        $("html").attr("dir") == "rtl"
                            ? "Next &larr;"
                            : "Next &rarr;",
                    previous:
                        $("html").attr("dir") == "rtl"
                            ? "&rarr; Prev"
                            : "&larr; Prev",
                },
            },
        });

        // Datatable with saving state
        $(".datatable-save-state").DataTable({
            stateSave: true,
        });

        // Scrollable datatable
        var table = $(".datatable-scroll-y").DataTable({
            autoWidth: true,
            scrollY: 300,
        });

        // Resize scrollable table when sidebar width changes
        $(".sidebar-control").on("click", function () {
            table.columns.adjust().draw();
        });
    };

    // Select2 for length menu styling
    var _componentSelect2 = function () {
        if (!$().select2) {
            console.warn("Warning - select2.min.js is not loaded.");
            return;
        }

        // Initialize
        $(".dataTables_length select").select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: "auto",
        });
    };

    //
    // Return objects assigned to module
    //

    return {
        init: function () {
            _componentDatatableBasic();
            // _componentSelect2();
        },
    };
})();

// Initialize module
// ------------------------------

document.addEventListener("DOMContentLoaded", function () {
    DatatableBasic.init();
});

function deactive(id) {
    $("[id=" + id + "]").prop("checked", false);
    $("[id=" + id + "]")
        .next()
        .css({
            boxShadow: "rgb(223, 223, 223) 0px 0px 0px 0px inset",
            borderColor: " rgb(223, 223, 223)",
            backgroundColor: "rgb(255, 255, 255)",
            transition: "border 0.4s ease 0s, box-shadow 0.4s ease 0s",
        });
    $("[id=" + id + "]")
        .next()
        .children("small")
        .css({
            left: "0px",
            transition: "background-color 0.4s ease 0s, left 0.2s ease 0s",
        });
}

function deactiveAll(arr = []) {
    arr.forEach((id) => {
        deactive(id);
    });
}

function doActive(id) {
    $("[id=" + id + "]").prop("checked", true);
    $("[id=" + id + "]")
        .next()
        .css({
            boxShadow: "rgb(100, 189, 99) 0px 0px 0px 10px inset",
            borderColor: " rgb(100, 189, 99)",
            backgroundColor: "rgb(100, 189, 99)",
            transition:
                "border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s",
        });
    $("[id=" + id + "]")
        .next()
        .children("small")
        .css({
            left: "18px",
            transition: "background-color 0.4s ease 0s, left 0.2s ease 0s",
            backgroundColor: "rgb(255, 255, 255)",
        });
}

function isJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
Array.prototype.remove = function (x) {
    var i;
    for (i in this) {
        if (this[i].toString() == x.toString()) {
            this.splice(i, 1);
        }
    }
};
function changeIsActive(e, msg, alertElement, url, ids = null) {
    let typeMsg = "card mb-2 alert alert-dismissible alert-";
    const id = $(e.currentTarget).attr("id");
    const is_active = $(e.currentTarget).is(":checked");
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: url,
        type: "PATCH",
        data: {
            id: id,
            is_active: is_active,
        },
        success: function (result) {
            if (isJsonString(result)) {
                const data = JSON.parse(result);
                if (data["type"] && data["message"]) {
                    const { type, message } = data;
                    typeMsg += type;
                    msg = message;

                    if (type === "danger") {
                        deactive(id);
                    }

                    if (type === "success" && ids && ids.length) {
                        if (is_active) {
                            const found = ids.find((value) => value.id === id);
                            if (found) {
                                ids.remove(found);
                            }
                        }
                    }
                }

                if (ids && data["ids"]) {
                    if (!ids.find((value) => value.id === id)) {
                        ids.push({
                            id: id,
                            ids: data["ids"],
                        });
                    }
                    deactiveAll(data["ids"]);
                }
            }
        },
        error: function (result) {
            if (isJsonString(result)) {
                const data = JSON.parse(result);
                const { type, message } = data;
                typeMsg += type;
                msg = message;
            }
        },
        complete: function (result) {
            alertElement.removeClass("d-none");
            alertElement[0].className = typeMsg;
            alertElement.children(".msg-text").html(msg);
        },
    });
}
