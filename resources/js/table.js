import { Datatable } from "tw-elements";

const customDatatable = document.getElementById("datatable");

new Datatable(
    customDatatable,
    {
        columns: [
            { label: "No", field: "no", sort: true },
            { label: "Nama", field: "fullname", sort: false },
            { label: "Email", field: "email", sort: false },
            { label: "Role", field: "role", sort: false },
            { label: "Nomor Telephone", field: "date", sort: true },
            { label: "Action", sort: false },
        ],
        rows: [],
    },
    {
        hover: true,
    },
);

const instance = new Datatable(document.getElementById("datatable"), data);

document
    .getElementById("datatable-search-input")
    .addEventListener("input", (e) => {
        instance.search(e.target.value);
    });
