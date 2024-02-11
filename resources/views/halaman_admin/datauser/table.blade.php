<!doctype html>
<html lang="en" class="antialiased">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>DataTables</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link
            href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"
            rel=" stylesheet"
        />
        <!--Replace with your tailwind.css once created-->

        <!--Regular Datatables CSS-->
        <link
            href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"
            rel="stylesheet"
        />
        <!--Responsive Extension Datatables CSS-->
        <link
            href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"
            rel="stylesheet"
        />

        <style>
            /*Overrides for Tailwind CSS */

            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568;
                /*text-gray-700*/
                padding-left: 1rem;
                /*pl-4*/
                padding-right: 1rem;
                /*pl-4*/
                padding-top: 0.5rem;
                /*pl-2*/
                padding-bottom: 0.5rem;
                /*pl-2*/
                line-height: 1.25;
                /*leading-tight*/
                border-width: 2px;
                /*border-2*/
                border-radius: 0.25rem;
                border-color: #edf2f7;
                /*border-gray-200*/
                background-color: #edf2f7;
                /*bg-gray-200*/
            }

            /*Row Hover*/
            table.dataTable.hover tbody tr:hover,
            table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;
                /*bg-indigo-100*/
            }

            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                font-weight: 700;
                /*font-bold*/
                border-radius: 0.25rem;
                /*rounded*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                color: #fff !important;
                /*text-white*/
                box-shadow:
                    0 1px 3px 0 rgba(0, 0, 0, 0.1),
                    0 1px 2px 0 rgba(0, 0, 0, 0.06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: 0.25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Hover */
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                color: #fff !important;
                /*text-white*/
                box-shadow:
                    0 1px 3px 0 rgba(0, 0, 0, 0.1),
                    0 1px 2px 0 rgba(0, 0, 0, 0.06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: 0.25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                /*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }

            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed
                > tbody
                > tr
                > td:first-child:before,
            table.dataTable.dtr-inline.collapsed
                > tbody
                > tr
                > th:first-child:before {
                background-color: #667eea !important;
                /*bg-indigo-500*/
            }
        </style>
    </head>

    <body
        class="bg-gray-100 text-gray-900 tracking-wider leading-normal dark:bg_"
    >
        <!--Container-->
        <div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2">
            <!--Title-->
            <h1
                class="flex items-center font-sans font-bold break-normal text-indigo-500 px-2 py-8 text-xl md:text-2xl"
            >
                Responsive
                <a class="underline mx-2" href="https://datatables.net/"
                    >DataTables.net</a
                >
                Table
            </h1>

            <!--Card-->
            <div class="unit w-2-3">
                <div class="hero-callout">
                    <div id="example_wrapper" class="dataTables_wrapper">
                        <div class="dataTables_length" id="example_length">
                            <label
                                >Show
                                <select
                                    name="example_length"
                                    aria-controls="example"
                                    class=""
                                >
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries</label
                            >
                        </div>
                        <div id="example_filter" class="dataTables_filter">
                            <label
                                >Search:<input
                                    type="search"
                                    class=""
                                    placeholder=""
                                    aria-controls="example"
                            /></label>
                        </div>
                        <table
                            id="example"
                            class="display nowrap dataTable dtr-inline collapsed"
                            style="width: 100%"
                            aria-describedby="example_info"
                        >
                            <thead>
                                <tr>
                                    <th
                                        class="sorting sorting_asc"
                                        tabindex="0"
                                        aria-controls="example"
                                        rowspan="1"
                                        colspan="1"
                                        style="width: 125px"
                                        aria-label="Name: activate to sort column descending"
                                        aria-sort="ascending"
                                    >
                                        Name
                                    </th>
                                    <th
                                        class="sorting"
                                        tabindex="0"
                                        aria-controls="example"
                                        rowspan="1"
                                        colspan="1"
                                        style="width: 170px"
                                        aria-label="Position: activate to sort column ascending"
                                    >
                                        Position
                                    </th>
                                    <th
                                        class="sorting"
                                        tabindex="0"
                                        aria-controls="example"
                                        rowspan="1"
                                        colspan="1"
                                        style="width: 77px"
                                        aria-label="Office: activate to sort column ascending"
                                    >
                                        Office
                                    </th>
                                    <th
                                        class="dt-body-right sorting"
                                        tabindex="0"
                                        aria-controls="example"
                                        rowspan="1"
                                        colspan="1"
                                        style="width: 28px"
                                        aria-label="Age: activate to sort column ascending"
                                    >
                                        Age
                                    </th>
                                    <th
                                        class="dt-body-right sorting dtr-hidden"
                                        tabindex="0"
                                        aria-controls="example"
                                        rowspan="1"
                                        colspan="1"
                                        style="width: 67px; display: none"
                                        aria-label="Start date: activate to sort column ascending"
                                    >
                                        Start date
                                    </th>
                                    <th
                                        class="dt-body-right sorting dtr-hidden"
                                        tabindex="0"
                                        aria-controls="example"
                                        rowspan="1"
                                        colspan="1"
                                        style="width: 0px; display: none"
                                        aria-label="Salary: activate to sort column ascending"
                                    >
                                        Salary
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd dt-hasChild parent">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                        style=""
                                    >
                                        Airi Satou
                                    </td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td class="dt-body-right">33</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        11/28/2008
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $162,700
                                    </td>
                                </tr>
                                <tr class="child">
                                    <td class="child" colspan="4">
                                        <ul
                                            data-dtr-index="4"
                                            class="dtr-details"
                                        >
                                            <li
                                                class="dt-body-right"
                                                data-dtr-index="4"
                                                data-dt-row="4"
                                                data-dt-column="4"
                                            >
                                                <span class="dtr-title"
                                                    >Start date</span
                                                >
                                                <span class="dtr-data"
                                                    >11/28/2008</span
                                                >
                                            </li>
                                            <li
                                                class="dt-body-right"
                                                data-dtr-index="5"
                                                data-dt-row="4"
                                                data-dt-column="5"
                                            >
                                                <span class="dtr-title"
                                                    >Salary</span
                                                >
                                                <span class="dtr-data"
                                                    >$162,700</span
                                                >
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                    >
                                        Angelica Ramos
                                    </td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td class="dt-body-right">47</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        10/9/2009
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $1,200,000
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                    >
                                        Ashton Cox
                                    </td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td class="dt-body-right">66</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        1/12/2009
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $86,000
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                    >
                                        Bradley Greer
                                    </td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td class="dt-body-right">41</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        10/13/2012
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $132,000
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                    >
                                        Brenden Wagner
                                    </td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td class="dt-body-right">28</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        6/7/2011
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $206,850
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                    >
                                        Brielle Williamson
                                    </td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td class="dt-body-right">61</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        12/2/2012
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $372,000
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                    >
                                        Bruno Nash
                                    </td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td class="dt-body-right">38</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        5/3/2011
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $163,500
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                    >
                                        Caesar Vance
                                    </td>
                                    <td>Pre-Sales Support</td>
                                    <td>New York</td>
                                    <td class="dt-body-right">21</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        12/12/2011
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $106,450
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                    >
                                        Cara Stevens
                                    </td>
                                    <td>Sales Assistant</td>
                                    <td>New York</td>
                                    <td class="dt-body-right">46</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        12/6/2011
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $145,600
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td
                                        class="dtr-control sorting_1"
                                        tabindex="0"
                                    >
                                        Cedric Kelly
                                    </td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td class="dt-body-right">22</td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        3/29/2012
                                    </td>
                                    <td
                                        class="dt-body-right dtr-hidden"
                                        style="display: none"
                                    >
                                        $433,060
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Position</th>
                                    <th rowspan="1" colspan="1">Office</th>
                                    <th
                                        class="dt-body-right"
                                        rowspan="1"
                                        colspan="1"
                                    >
                                        Age
                                    </th>
                                    <th
                                        class="dt-body-right dtr-hidden"
                                        rowspan="1"
                                        colspan="1"
                                        style="display: none"
                                    >
                                        Start date
                                    </th>
                                    <th
                                        class="dt-body-right dtr-hidden"
                                        rowspan="1"
                                        colspan="1"
                                        style="display: none"
                                    >
                                        Salary
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <div
                            class="dataTables_info"
                            id="example_info"
                            role="status"
                            aria-live="polite"
                        >
                            Showing 1 to 10 of 57 entries
                        </div>
                        <div
                            class="dataTables_paginate paging_simple_numbers"
                            id="example_paginate"
                        >
                            <a
                                class="paginate_button previous disabled"
                                aria-controls="example"
                                aria-disabled="true"
                                role="link"
                                data-dt-idx="previous"
                                tabindex="-1"
                                id="example_previous"
                                >Previous</a
                            ><span
                                ><a
                                    class="paginate_button current"
                                    aria-controls="example"
                                    role="link"
                                    aria-current="page"
                                    data-dt-idx="0"
                                    tabindex="0"
                                    >1</a
                                ><a
                                    class="paginate_button"
                                    aria-controls="example"
                                    role="link"
                                    data-dt-idx="1"
                                    tabindex="0"
                                    >2</a
                                ><a
                                    class="paginate_button"
                                    aria-controls="example"
                                    role="link"
                                    data-dt-idx="2"
                                    tabindex="0"
                                    >3</a
                                ><a
                                    class="paginate_button"
                                    aria-controls="example"
                                    role="link"
                                    data-dt-idx="3"
                                    tabindex="0"
                                    >4</a
                                ><a
                                    class="paginate_button"
                                    aria-controls="example"
                                    role="link"
                                    data-dt-idx="4"
                                    tabindex="0"
                                    >5</a
                                ><a
                                    class="paginate_button"
                                    aria-controls="example"
                                    role="link"
                                    data-dt-idx="5"
                                    tabindex="0"
                                    >6</a
                                ></span
                            ><a
                                class="paginate_button next"
                                aria-controls="example"
                                role="link"
                                data-dt-idx="next"
                                tabindex="0"
                                id="example_next"
                                >Next</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <!--/Card-->
        </div>
        <!--/container-->

        <!-- jQuery -->
        <script
            type="text/javascript"
            src="https://code.jquery.com/jquery-3.4.1.min.js"
        ></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function () {
                var table = $("#example")
                    .DataTable({
                        responsive: true,
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </body>
</html>
