"use strict";
var KTShippingAddressList = (function () {
    var e,
        t,
        n,
        r,
        o = document.getElementById("kt_business_table"),
        c = () => {
            o.querySelectorAll(
                '[data-kt-brands-table-filter="delete_row"]'
            ).forEach((t) => {
                var btn_delete = t;
                t.addEventListener("click", function (t) {
                    t.preventDefault();
                    const n = t.target.closest("tr"),
                        r = n
                            .querySelectorAll("td")[1]
                            .querySelector("span#brand_name").innerText;
                    //   , r = n.querySelectorAll("td")[1].innerText;
                    Swal.fire({
                        text:
                            "Está seguro que quiere eliminar la marca de vehículo: " +
                            r +
                            "?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Si, eliminar!",
                        cancelButtonText: "No, cancelar",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton:
                                "btn fw-bold btn-active-light-primary",
                        },
                    }).then(function (t) {
                        var addressId = btn_delete.getAttribute("data-id");
                        t.value
                            ? $.ajax({
                                  headers: {
                                      "X-CSRF-TOKEN": $(
                                          'meta[name="csrf-token"]'
                                      ).attr("content"),
                                  },
                                  data: { addressId: addressId },
                                  url: route_delete_address,
                                  type: "POST",
                                  dataType: "json",
                                  success: function (data) {
                                      Swal.fire({
                                          text: data.message,
                                          icon: data.status,
                                          buttonsStyling: !1,
                                          confirmButtonText: "Ok, entendido!",
                                          customClass: {
                                              confirmButton:
                                                  "btn fw-bold btn-primary",
                                          },
                                      });

                                      if (data.status === "success") {
                                          e.row($(n)).remove().draw();
                                      }
                                  },
                              })
                            : "cancel" === t.dismiss &&
                              Swal.fire({
                                  text: r + " no fue eliminada.",
                                  icon: "error",
                                  buttonsStyling: !1,
                                  confirmButtonText: "Ok, entendido!",
                                  customClass: {
                                      confirmButton: "btn fw-bold btn-primary",
                                  },
                              });
                    });
                });
            });
        };
    return {
        init: function () {
            o &&
                ((e = $(o).DataTable({
                    info: !1,
                    order: [[0, "asc"]],
                    pageLength: 10,
                    lengthChange: !1,
                    columnDefs: [
                        {
                            orderable: !1,
                            // className: 'text-end',
                            targets: 3,
                        },
                        {
                            orderable: !1,
                            className: "text-end",
                            targets: 3,
                        },
                    ],
                })).on("draw", function () {
                    c();
                }),
                document
                    .querySelector(
                        '[data-kt-brands-table-filter="search"]'
                    )
                    .addEventListener("keyup", function (t) {
                        console.log(e.columns(":visible").count());
                        e.search(t.target.value).draw();
                    }),
                document
                    .querySelector(
                        '[data-kt-brands-table-filter="reset"]'
                    )
                    .addEventListener("click", function () {
                        document
                            .querySelector(
                                '[data-kt-brands-table-filter="form"]'
                            )
                            .querySelectorAll("select")
                            .forEach((e) => {
                                $(e).val("").trigger("change");
                            }),
                            e.search("").draw();
                    }),
                c(),
                (() => {
                    const t = document.querySelector(
                            '[data-kt-brands-table-filter="form"]'
                        ),
                        n = t.querySelector(
                            '[data-kt-brands-table-filter="filter"]'
                        ),
                        r = t.querySelectorAll("select");
                    n.addEventListener("click", function () {
                        var t = "";
                        r.forEach((e, n) => {
                            console.log(e.value);
                            e.value &&
                                "" !== e.value &&
                                (0 !== n && (t += " "), (t += e.value));
                        }),
                            e.search(t).draw();
                    });
                })());
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTShippingAddressList.init();
});
