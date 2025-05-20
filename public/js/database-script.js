function tlabsConfirmCancel(elementType) {
    $(document.body).on("click", "form.form_cancel_element", function (e) {
        e.preventDefault();
        var elementForm = $(this).attr("id");
        var elementName = $(this).data("name_element");
        var element = tlabs_getElementByType(elementType);

        Swal.fire({
            text:
                "¿Estás seguro que quieres anular el registro " +
                elementName +
                "?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Si, anular!",
            cancelButtonText: "No",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary",
            },
        }).then(function (result) {
            if (result.value) {
                document.forms[elementForm].submit();
                Swal.fire({
                    icon: "success",
                    title: "Anulando!",
                    text: "El registro ha sido anulado..",
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        });
    });
}

function tlabsConfirmDelete(elementType) {
    $(document.body).on("click", "form.form_delete_element", function (e) {
        e.preventDefault();
        var elementForm = $(this).attr("id");
        var elementName = $(this).data("name_element");
        var element = tlabs_getElementByType(elementType);

        Swal.fire({
            text:
                "¿Estás seguro que quieres eliminar el registro " +
                elementName +
                "?",
            icon: "warning",
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Si, eliminar!",
            cancelButtonText: "No, cancelar",
            customClass: {
                confirmButton: "btn fw-bold btn-danger",
                cancelButton: "btn fw-bold btn-active-light-primary",
            },
        }).then(function (result) {
            if (result.value) {
                document.forms[elementForm].submit();
                Swal.fire({
                    icon: "success",
                    title: "Eliminando!",
                    text: "El registro ha sido eliminado..",
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        });
    });
}

function tlabs_getElementByType(elementType) {
    var returnElement = [];
    if (elementType === "categories") {
        returnElement = "la categoría";
    }
    if (elementType === "taxes") {
        returnElement = "el impuesto";
    }
    if (elementType === "doctor") {
        returnElement = "al Dr(a).";
    }
    if (elementType === "appointment") {
        returnElement = "la visita programada para el día";
    }
    if (elementType === "patient") {
        returnElement = "al paciente";
    }
    return returnElement;
}

function createStatusRoundedCircleElement(ktIDStatusElement, statusIDSelect) {
    const e = document.getElementById(ktIDStatusElement);
    var statusSelect = $("#" + statusIDSelect)
        .select2()
        .val();
    const classBg = ["bg-success", "bg-warning", "bg-danger", "bg-secondary"];
    switch (statusSelect) {
        case "3":
            e.classList.remove(...classBg);
            e.classList.add("bg-secondary");
            break;
        case "2":
            e.classList.remove(...classBg);
            e.classList.add("bg-warning");
            break;
        case "1":
            e.classList.remove(...classBg);
            e.classList.add("bg-success");
            break;
        case "0":
            e.classList.remove(...classBg);
            e.classList.add("bg-danger");
    }

    $($("#" + statusIDSelect).select2()).on("change", function (t) {
        switch (t.target.value) {
            case "3":
                e.classList.remove(...classBg);
                e.classList.add("bg-secondary");
                break;
            case "2":
                e.classList.remove(...classBg);
                e.classList.add("bg-warning");
                break;
            case "1":
                e.classList.remove(...classBg);
                e.classList.add("bg-success");
                break;
            case "0":
                e.classList.remove(...classBg);
                e.classList.add("bg-danger");
        }
    });
}

function createQuillInput(ktQuillId, inputID, placeholder_description = "") {
    const toolbarOptions = [
        ["bold", "italic", "underline", "strike"], // toggled buttons
        ["blockquote", "code-block"],
        ["link", "image", "video", "formula"],

        [{ header: 1 }, { header: 2 }], // custom button values
        [{ list: "ordered" }, { list: "bullet" }, { list: "check" }],
        [{ script: "sub" }, { script: "super" }], // superscript/subscript
        [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
        [{ direction: "rtl" }], // text direction

        [{ size: ["small", false, "large", "huge"] }], // custom dropdown
        [{ header: [1, 2, 3, 4, 5, 6, false] }],

        [{ color: [] }, { background: [] }], // dropdown with defaults from theme
        [{ font: [] }],
        [{ align: [] }],

        ["clean"], // remove formatting button
    ];
    var descriptionQuill = new Quill("#" + ktQuillId, {
        modules: {
            toolbar: toolbarOptions,
        },
        placeholder:
            placeholder_description != ""
                ? placeholder_description
                : "Detalle del producto...",
        theme: "snow",
    });

    var descrtiptionValue = $("#" + inputID).val();
    if (descrtiptionValue !== "") {
        var htmlToInsert = descrtiptionValue;
        var editor = document.getElementsByClassName("ql-editor");
        editor[0].innerHTML = htmlToInsert;
    }

    descriptionQuill.on("text-change", function (delta, oldDelta, source) {
        let textValue = descriptionQuill.getSemanticHTML();
        $("#" + inputID).val(textValue);
    });
}

function validatedForm(formID, buttonID, fields) {
    let e;
    const t = document.getElementById(formID),
        o = document.getElementById(buttonID);
    $("#" + buttonID).off("click");

    e = FormValidation.formValidation(t, {
        fields,
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: "",
            }),
        },
    });
    $("#" + buttonID).on("click", function (a) {
        // o.addEventListener("click", (a=>{
        a.preventDefault(),
            e &&
                e.validate().then(function (e) {
                    console.log("validated!"),
                        "Valid" == e
                            ? (o.setAttribute("data-kt-indicator", "on"),
                              (o.disabled = !0),
                              setTimeout(function () {
                                  o.removeAttribute("data-kt-indicator"); //,
                                  document.forms[formID].submit();
                                  /* Swal.fire({
                    text: "¡El formulario ha sido enviado con éxito!",
                    icon: "success",
                    buttonsStyling: !1,
                    confirmButtonText: "Ok",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                }).then((function(e) {
                    e.isConfirmed && (o.disabled = !1,
                        document.forms[formID].submit()
                    )
                }
                )) */
                              }, 2e3))
                            : Swal.fire({
                                  text: "Lo sentimos, parece que se han detectado algunos errores, inténtalo de nuevo.",
                                  icon: "error",
                                  buttonsStyling: !1,
                                  confirmButtonText: "¡Ok, entendido!",
                                  customClass: {
                                      confirmButton: "btn btn-primary",
                                  },
                              });
                });
    });
    // ))
}

var liveCalendar = function () {
    var releaseDate = $(document.getElementById("live_date"));
    releaseDate.flatpickr({
        enableTime: true,
        time_24hr: true,
        minDate: "today",
        defaultDate: new Date(), //"today",
        dateFormat: "d-m-Y H:i", //https://flatpickr.js.org/
        locale: {
            firstDayOfWeek: 1, // start week on Monday
        },
    });
};

function validatePhone(idField) {
    $(idField).on("change", function () {
        if (typeof countryCode === "undefined") {
            countryCode = $("#country_code").val();
        }

        var phoneNumberUtil = libphonenumber;
        var phone = $(this).val();
        var formattedPhone = phoneNumberUtil.parsePhoneNumber(
            phone,
            countryCode
        );

        console.log(formattedPhone);

        // Comprueba si el número de teléfono es válido para el país seleccionado
        var feedback_field_phone = $("#field_phone div.invalid-feedback");

        $("span.feedback_phone").remove();

        if (
            phoneNumberUtil.isValidNumberForRegion(phone, countryCode) === false
        ) {
            // var feedback_message = '<span class="text-danger text-left feedback_phone">El número de teléfono no es válido para el país seleccionado</span>';
            var feedback_message =
                '<span class="text-danger text-left feedback_phone">El número de teléfono no es válido</span>';
            feedback_field_phone.html(feedback_message);
            return;
        }

        $(this).val(formattedPhone.number);
        // $("#national_number").val(formattedPhone.number);
        // $(this).val(formattedPhone.nationalNumber);
    });
}

/**
 * This code is to show or hide the password content
 */
const togglePassword = document.querySelector("#togglePassword");
// const password = document.querySelector('#password');

if (togglePassword) {
    togglePassword.addEventListener("click", () => {
        let password = document.getElementById("password");
        let show_eye = document.getElementById("show_eye");
        let hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (password.type === "password") {
            password.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            password.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    });
}

function changeCitiesByState() {
    $("#states").on("change", function () {
        let stateId = $("#states option:selected").val();
        // let url     = "{{ route('companies.state.cities') }}";

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            method: "GET",
            url: route_state_cities,
            data: { stateId: stateId },
            datatype: "json",
            success: function (cities) {
                $("#cities").empty();
                $.each(cities, function (city_id, city_name) {
                    $('select[id="cities"]').append(
                        '<option value="' +
                            city_id +
                            '">' +
                            city_name +
                            "</option>"
                    );
                });

                $('[data-control="select2"]').select2();
            },
        });
    });
}

function showManifestPDF() {
    $("table.tbl_manifests").on("click", ".showManifest", function () {
        var guide = $(this).data("guide");

        $("#modalShowManifest_" + guide).modal("show");
    });
}

function addDataTableByID(
    tableID,
    orderBy = 0,
    columnOption = null,
    orderByType = "asc"
) {
    var configDT = datatableConfig(
        tableID,
        (orderBy = 0),
        (columnOption = null),
        (orderByType = "asc")
    );
    if ($("#" + tableID).length) {
        orderBy = orderBy - 1;
        columnOption = columnOption - 1;
        var rspTable = $("#" + tableID).DataTable(configDT);

        return rspTable;
    }
}

function datatableConfig(
    tableID,
    orderBy = 0,
    columnOption = null,
    orderByType = "asc"
) {
    var configDataTable = {
        /* "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },*/
        fixedHeader: true,
        paging: true,
        bFilter: false,
        ordering: true,
        select: false,
        searching: true,
        lengthChange: true,
        columnDefs: [
            /* { targets: 0, className: "sorting_1 dtr-control" }, */
            {
                targets: columnOption,
                searchable: false,
                orderable: false,
                visible: true,
            },
            /* {orderable:!1,targets:columnOption},
            {
                targets           : columnOption,
                responsivePriority: 1,
                filterable        : false,
                sortable          : true
            }, */
            { responsivePriority: 1, targets: 0 },
        ],
        initComplete: function () {
            var api = this.api(),
                searchBox = $("#" + tableID + "-search-input");
            if (searchBox.length > 0) {
                searchBox.on("keyup", function (event) {
                    api.search(event.target.value).draw();
                });
            }
        },
        order: [orderBy, orderByType],
        responsive: {
            details: {
                type: "column",
                target: 0,
            },
        },
        bDestroy: true,
    };

    return configDataTable;
}

function validationCharactersLong(text, long) {
    if (text.length >= long) {
        return 1;
    }
    return 0;
}

function validationPasswordString(text, parameter) {
    for (let i = 0; i < text.length; i++) {
        if (parameter.indexOf(text.charAt(i), 0) != -1) {
            return 1;
        }
    }
    return 0;
}
