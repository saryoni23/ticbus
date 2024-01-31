import { Datatable } from "tw-elements";

const customDatatable = document.getElementById("datatable");

new Datatable(
    customDatatable,
    {
        columns: [
            {
                label: "No",
                field: "no",
                sort: true,
            },
            {
                label: "Nama",
                field: "fullname",
                sort: false,
            },
            {
                label: "Email",
                field: "office",
                sort: false,
            },
            {
                label: "Role",
                field: "age",
                sort: false,
            },
            {
                label: "Nomor Telephone",
                field: "date",
                sort: true,
            },
            {
                label: "Action",
                field: "salary",
                sort: false,
            },
        ],
        rows: [],
    },
    {
        hover: true,
    },
);

// const instance = new Datatable(document.getElementById("datatable"), Datatable);

document
    .getElementById("datatable-search-input")
    .addEventListener("input", (e) => {
        instance.search(e.target.value);
    });
