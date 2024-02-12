!(function (e, t) {
    "object" == typeof exports && "object" == typeof module
        ? (module.exports = t())
        : "function" == typeof define && define.amd
          ? define("Flowbite", [], t)
          : "object" == typeof exports
            ? (exports.Flowbite = t())
            : (e.Flowbite = t());
})(self, function () {
    return (function () {
        "use strict";
        var e = {
                482: function (e, t, i) {
                    i.d(t, {
                        Z: function () {
                            return c;
                        },
                    });
                    var r = i(698),
                        n = i(963),
                        a = i(770);
                    function s(e) {
                        const t = Object.assign({}, e);
                        return (
                            delete t.inputs,
                            delete t.allowOneSidedRange,
                            delete t.maxNumberOfDates,
                            t
                        );
                    }
                    function o(e, t, i, n) {
                        (0, r.cF)(e, [[i, "changeDate", t]]), new a.Z(i, n, e);
                    }
                    function d(e, t) {
                        if (e._updating) return;
                        e._updating = !0;
                        const i = t.target;
                        if (void 0 === i.datepicker) return;
                        const r = e.datepickers,
                            n = { render: !1 },
                            a = e.inputs.indexOf(i),
                            s = 0 === a ? 1 : 0,
                            o = r[a].dates[0],
                            d = r[s].dates[0];
                        void 0 !== o && void 0 !== d
                            ? 0 === a && o > d
                                ? (r[0].setDate(d, n), r[1].setDate(o, n))
                                : 1 === a &&
                                  o < d &&
                                  (r[0].setDate(o, n), r[1].setDate(d, n))
                            : e.allowOneSidedRange ||
                              (void 0 === o && void 0 === d) ||
                              ((n.clear = !0), r[s].setDate(r[a].dates, n)),
                            r[0].picker.update().render(),
                            r[1].picker.update().render(),
                            delete e._updating;
                    }
                    class c {
                        constructor(e, t = {}) {
                            const i = Array.isArray(t.inputs)
                                ? t.inputs
                                : Array.from(e.querySelectorAll("input"));
                            if (i.length < 2) return;
                            (e.rangepicker = this),
                                (this.element = e),
                                (this.inputs = i.slice(0, 2)),
                                (this.allowOneSidedRange =
                                    !!t.allowOneSidedRange);
                            const r = d.bind(null, this),
                                n = s(t),
                                a = [];
                            Object.defineProperty(this, "datepickers", {
                                get() {
                                    return a;
                                },
                            }),
                                o(this, r, this.inputs[0], n),
                                o(this, r, this.inputs[1], n),
                                Object.freeze(a),
                                a[0].dates.length > 0
                                    ? d(this, { target: this.inputs[0] })
                                    : a[1].dates.length > 0 &&
                                      d(this, { target: this.inputs[1] });
                        }
                        get dates() {
                            return 2 === this.datepickers.length
                                ? [
                                      this.datepickers[0].dates[0],
                                      this.datepickers[1].dates[0],
                                  ]
                                : void 0;
                        }
                        setOptions(e) {
                            this.allowOneSidedRange = !!e.allowOneSidedRange;
                            const t = s(e);
                            this.datepickers[0].setOptions(t),
                                this.datepickers[1].setOptions(t);
                        }
                        destroy() {
                            this.datepickers[0].destroy(),
                                this.datepickers[1].destroy(),
                                (0, r.uV)(this),
                                delete this.element.rangepicker;
                        }
                        getDates(e) {
                            const t = e
                                ? (t) =>
                                      (0, n.p6)(
                                          t,
                                          e,
                                          this.datepickers[0].config.locale,
                                      )
                                : (e) => new Date(e);
                            return this.dates.map((e) =>
                                void 0 === e ? e : t(e),
                            );
                        }
                        setDates(e, t) {
                            const [i, r] = this.datepickers,
                                n = this.dates;
                            (this._updating = !0),
                                i.setDate(e),
                                r.setDate(t),
                                delete this._updating,
                                r.dates[0] !== n[1]
                                    ? d(this, { target: this.inputs[1] })
                                    : i.dates[0] !== n[0] &&
                                      d(this, { target: this.inputs[0] });
                        }
                    }
                },
                770: function (e, t, i) {
                    i.d(t, {
                        Z: function () {
                            return ae;
                        },
                    });
                    var r = i(105),
                        n = i(560),
                        a = i(963),
                        s = i(698);
                    const o = {
                        en: {
                            days: [
                                "Sunday",
                                "Monday",
                                "Tuesday",
                                "Wednesday",
                                "Thursday",
                                "Friday",
                                "Saturday",
                            ],
                            daysShort: [
                                "Sun",
                                "Mon",
                                "Tue",
                                "Wed",
                                "Thu",
                                "Fri",
                                "Sat",
                            ],
                            daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                            months: [
                                "January",
                                "February",
                                "March",
                                "April",
                                "May",
                                "June",
                                "July",
                                "August",
                                "September",
                                "October",
                                "November",
                                "December",
                            ],
                            monthsShort: [
                                "Jan",
                                "Feb",
                                "Mar",
                                "Apr",
                                "May",
                                "Jun",
                                "Jul",
                                "Aug",
                                "Sep",
                                "Oct",
                                "Nov",
                                "Dec",
                            ],
                            today: "Today",
                            clear: "Clear",
                            titleFormat: "MM y",
                        },
                    };
                    var d = {
                        autohide: !1,
                        beforeShowDay: null,
                        beforeShowDecade: null,
                        beforeShowMonth: null,
                        beforeShowYear: null,
                        calendarWeeks: !1,
                        clearBtn: !1,
                        dateDelimiter: ",",
                        datesDisabled: [],
                        daysOfWeekDisabled: [],
                        daysOfWeekHighlighted: [],
                        defaultViewDate: void 0,
                        disableTouchKeyboard: !1,
                        format: "mm/dd/yyyy",
                        language: "en",
                        maxDate: null,
                        maxNumberOfDates: 1,
                        maxView: 3,
                        minDate: null,
                        nextArrow:
                            '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',
                        orientation: "auto",
                        pickLevel: 0,
                        prevArrow:
                            '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>',
                        showDaysOfWeek: !0,
                        showOnClick: !0,
                        showOnFocus: !0,
                        startView: 0,
                        title: "",
                        todayBtn: !1,
                        todayBtnMode: 0,
                        todayHighlight: !1,
                        updateOnBlur: !0,
                        weekStart: 0,
                    };
                    const c = document.createRange();
                    function l(e) {
                        return c.createContextualFragment(e);
                    }
                    function h(e) {
                        "none" !== e.style.display &&
                            (e.style.display &&
                                (e.dataset.styleDisplay = e.style.display),
                            (e.style.display = "none"));
                    }
                    function u(e) {
                        "none" === e.style.display &&
                            (e.dataset.styleDisplay
                                ? ((e.style.display = e.dataset.styleDisplay),
                                  delete e.dataset.styleDisplay)
                                : (e.style.display = ""));
                    }
                    function g(e) {
                        e.firstChild && (e.removeChild(e.firstChild), g(e));
                    }
                    const { language: f, format: p, weekStart: m } = d;
                    function b(e, t) {
                        return e.length < 6 && t >= 0 && t < 7
                            ? (0, r.$C)(e, t)
                            : e;
                    }
                    function y(e) {
                        return (e + 6) % 7;
                    }
                    function w(e, t, i, r) {
                        const n = (0, a.sG)(e, t, i);
                        return void 0 !== n ? n : r;
                    }
                    function k(e, t, i = 3) {
                        const r = parseInt(e, 10);
                        return r >= 0 && r <= i ? r : t;
                    }
                    function v(e, t) {
                        const i = Object.assign({}, e),
                            s = {},
                            o = t.constructor.locales;
                        let {
                            format: c,
                            language: h,
                            locale: u,
                            maxDate: g,
                            maxView: v,
                            minDate: x,
                            pickLevel: D,
                            startView: M,
                            weekStart: S,
                        } = t.config || {};
                        if (i.language) {
                            let e;
                            if (
                                (i.language !== h &&
                                    (o[i.language]
                                        ? (e = i.language)
                                        : ((e = i.language.split("-")[0]),
                                          void 0 === o[e] && (e = !1))),
                                delete i.language,
                                e)
                            ) {
                                h = s.language = e;
                                const t = u || o[f];
                                (u = Object.assign(
                                    { format: p, weekStart: m },
                                    o[f],
                                )),
                                    h !== f && Object.assign(u, o[h]),
                                    (s.locale = u),
                                    c === t.format && (c = s.format = u.format),
                                    S === t.weekStart &&
                                        ((S = s.weekStart = u.weekStart),
                                        (s.weekEnd = y(u.weekStart)));
                            }
                        }
                        if (i.format) {
                            const e = "function" == typeof i.format.toDisplay,
                                t = "function" == typeof i.format.toValue,
                                r = a.CL.test(i.format);
                            ((e && t) || r) && (c = s.format = i.format),
                                delete i.format;
                        }
                        let O = x,
                            C = g;
                        if (
                            (void 0 !== i.minDate &&
                                ((O =
                                    null === i.minDate
                                        ? (0, n.by)(0, 0, 1)
                                        : w(i.minDate, c, u, O)),
                                delete i.minDate),
                            void 0 !== i.maxDate &&
                                ((C =
                                    null === i.maxDate
                                        ? void 0
                                        : w(i.maxDate, c, u, C)),
                                delete i.maxDate),
                            C < O
                                ? ((x = s.minDate = C), (g = s.maxDate = O))
                                : (x !== O && (x = s.minDate = O),
                                  g !== C && (g = s.maxDate = C)),
                            i.datesDisabled &&
                                ((s.datesDisabled = i.datesDisabled.reduce(
                                    (e, t) => {
                                        const i = (0, a.sG)(t, c, u);
                                        return void 0 !== i
                                            ? (0, r.$C)(e, i)
                                            : e;
                                    },
                                    [],
                                )),
                                delete i.datesDisabled),
                            void 0 !== i.defaultViewDate)
                        ) {
                            const e = (0, a.sG)(i.defaultViewDate, c, u);
                            void 0 !== e && (s.defaultViewDate = e),
                                delete i.defaultViewDate;
                        }
                        if (void 0 !== i.weekStart) {
                            const e = Number(i.weekStart) % 7;
                            isNaN(e) ||
                                ((S = s.weekStart = e), (s.weekEnd = y(e))),
                                delete i.weekStart;
                        }
                        if (
                            (i.daysOfWeekDisabled &&
                                ((s.daysOfWeekDisabled =
                                    i.daysOfWeekDisabled.reduce(b, [])),
                                delete i.daysOfWeekDisabled),
                            i.daysOfWeekHighlighted &&
                                ((s.daysOfWeekHighlighted =
                                    i.daysOfWeekHighlighted.reduce(b, [])),
                                delete i.daysOfWeekHighlighted),
                            void 0 !== i.maxNumberOfDates)
                        ) {
                            const e = parseInt(i.maxNumberOfDates, 10);
                            e >= 0 &&
                                ((s.maxNumberOfDates = e),
                                (s.multidate = 1 !== e)),
                                delete i.maxNumberOfDates;
                        }
                        i.dateDelimiter &&
                            ((s.dateDelimiter = String(i.dateDelimiter)),
                            delete i.dateDelimiter);
                        let E = D;
                        void 0 !== i.pickLevel &&
                            ((E = k(i.pickLevel, 2)), delete i.pickLevel),
                            E !== D && (D = s.pickLevel = E);
                        let F = v;
                        void 0 !== i.maxView &&
                            ((F = k(i.maxView, v)), delete i.maxView),
                            (F = D > F ? D : F),
                            F !== v && (v = s.maxView = F);
                        let L = M;
                        if (
                            (void 0 !== i.startView &&
                                ((L = k(i.startView, L)), delete i.startView),
                            L < D ? (L = D) : L > v && (L = v),
                            L !== M && (s.startView = L),
                            i.prevArrow)
                        ) {
                            const e = l(i.prevArrow);
                            e.childNodes.length > 0 &&
                                (s.prevArrow = e.childNodes),
                                delete i.prevArrow;
                        }
                        if (i.nextArrow) {
                            const e = l(i.nextArrow);
                            e.childNodes.length > 0 &&
                                (s.nextArrow = e.childNodes),
                                delete i.nextArrow;
                        }
                        if (
                            (void 0 !== i.disableTouchKeyboard &&
                                ((s.disableTouchKeyboard =
                                    "ontouchstart" in document &&
                                    !!i.disableTouchKeyboard),
                                delete i.disableTouchKeyboard),
                            i.orientation)
                        ) {
                            const e = i.orientation.toLowerCase().split(/\s+/g);
                            (s.orientation = {
                                x:
                                    e.find(
                                        (e) => "left" === e || "right" === e,
                                    ) || "auto",
                                y:
                                    e.find(
                                        (e) => "top" === e || "bottom" === e,
                                    ) || "auto",
                            }),
                                delete i.orientation;
                        }
                        if (void 0 !== i.todayBtnMode) {
                            switch (i.todayBtnMode) {
                                case 0:
                                case 1:
                                    s.todayBtnMode = i.todayBtnMode;
                            }
                            delete i.todayBtnMode;
                        }
                        return (
                            Object.keys(i).forEach((e) => {
                                void 0 !== i[e] &&
                                    (0, r.l$)(d, e) &&
                                    (s[e] = i[e]);
                            }),
                            s
                        );
                    }
                    var x = (0, r.zh)(
                        '<div class="datepicker hidden">\n  <div class="datepicker-picker inline-block rounded-lg bg-white dark:bg-gray-700 shadow-lg p-4">\n    <div class="datepicker-header">\n      <div class="datepicker-title bg-white dark:bg-gray-700 dark:text-white px-2 py-3 text-center font-semibold"></div>\n      <div class="datepicker-controls flex justify-between mb-2">\n        <button type="button" class="bg-white dark:bg-gray-700 rounded-lg text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200 prev-btn"></button>\n        <button type="button" class="text-sm rounded-lg text-gray-900 dark:text-white bg-white dark:bg-gray-700 font-semibold py-2.5 px-5 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-200 view-switch"></button>\n        <button type="button" class="bg-white dark:bg-gray-700 rounded-lg text-gray-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white text-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-gray-200 next-btn"></button>\n      </div>\n    </div>\n    <div class="datepicker-main p-1"></div>\n    <div class="datepicker-footer">\n      <div class="datepicker-controls flex space-x-2 mt-2">\n        <button type="button" class="%buttonClass% today-btn text-white bg-blue-700 dark:bg-blue-600 hover:bg-blue-800 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-1/2"></button>\n        <button type="button" class="%buttonClass% clear-btn text-gray-900 dark:text-white bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center w-1/2"></button>\n      </div>\n    </div>\n  </div>\n</div>',
                    );
                    var D = (0, r.zh)(
                        `<div class="days">\n  <div class="days-of-week grid grid-cols-7 mb-1">${(0, r.em)("span", 7, { class: "dow block flex-1 leading-9 border-0 rounded-lg cursor-default text-center text-gray-900 font-semibold text-sm" })}</div>\n  <div class="datepicker-grid w-64 grid grid-cols-7">${(0, r.em)("span", 42, { class: "block flex-1 leading-9 border-0 rounded-lg cursor-default text-center text-gray-900 font-semibold text-sm h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400" })}</div>\n</div>`,
                    );
                    var M = (0, r.zh)(
                        `<div class="calendar-weeks">\n  <div class="days-of-week flex"><span class="dow h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400"></span></div>\n  <div class="weeks">${(0, r.em)("span", 6, { class: "week block flex-1 leading-9 border-0 rounded-lg cursor-default text-center text-gray-900 font-semibold text-sm" })}</div>\n</div>`,
                    );
                    class S {
                        constructor(e, t) {
                            Object.assign(this, t, {
                                picker: e,
                                element: l(
                                    '<div class="datepicker-view flex"></div>',
                                ).firstChild,
                                selected: [],
                            }),
                                this.init(this.picker.datepicker.config);
                        }
                        init(e) {
                            void 0 !== e.pickLevel &&
                                (this.isMinView = this.id === e.pickLevel),
                                this.setOptions(e),
                                this.updateFocus(),
                                this.updateSelection();
                        }
                        performBeforeHook(e, t, i) {
                            let n = this.beforeShow(new Date(i));
                            switch (typeof n) {
                                case "boolean":
                                    n = { enabled: n };
                                    break;
                                case "string":
                                    n = { classes: n };
                            }
                            if (n) {
                                if (
                                    (!1 === n.enabled &&
                                        (e.classList.add("disabled"),
                                        (0, r.$C)(this.disabled, t)),
                                    n.classes)
                                ) {
                                    const i = n.classes.split(/\s+/);
                                    e.classList.add(...i),
                                        i.includes("disabled") &&
                                            (0, r.$C)(this.disabled, t);
                                }
                                n.content &&
                                    (function (e, t) {
                                        g(e),
                                            t instanceof DocumentFragment
                                                ? e.appendChild(t)
                                                : "string" == typeof t
                                                  ? e.appendChild(l(t))
                                                  : "function" ==
                                                        typeof t.forEach &&
                                                    t.forEach((t) => {
                                                        e.appendChild(t);
                                                    });
                                    })(e, n.content);
                            }
                        }
                    }
                    class O extends S {
                        constructor(e) {
                            super(e, { id: 0, name: "days", cellClass: "day" });
                        }
                        init(e, t = !0) {
                            if (t) {
                                const e = l(D).firstChild;
                                (this.dow = e.firstChild),
                                    (this.grid = e.lastChild),
                                    this.element.appendChild(e);
                            }
                            super.init(e);
                        }
                        setOptions(e) {
                            let t;
                            if (
                                ((0, r.l$)(e, "minDate") &&
                                    (this.minDate = e.minDate),
                                (0, r.l$)(e, "maxDate") &&
                                    (this.maxDate = e.maxDate),
                                e.datesDisabled &&
                                    (this.datesDisabled = e.datesDisabled),
                                e.daysOfWeekDisabled &&
                                    ((this.daysOfWeekDisabled =
                                        e.daysOfWeekDisabled),
                                    (t = !0)),
                                e.daysOfWeekHighlighted &&
                                    (this.daysOfWeekHighlighted =
                                        e.daysOfWeekHighlighted),
                                void 0 !== e.todayHighlight &&
                                    (this.todayHighlight = e.todayHighlight),
                                void 0 !== e.weekStart &&
                                    ((this.weekStart = e.weekStart),
                                    (this.weekEnd = e.weekEnd),
                                    (t = !0)),
                                e.locale)
                            ) {
                                const i = (this.locale = e.locale);
                                (this.dayNames = i.daysMin),
                                    (this.switchLabelFormat = i.titleFormat),
                                    (t = !0);
                            }
                            if (
                                (void 0 !== e.beforeShowDay &&
                                    (this.beforeShow =
                                        "function" == typeof e.beforeShowDay
                                            ? e.beforeShowDay
                                            : void 0),
                                void 0 !== e.calendarWeeks)
                            )
                                if (e.calendarWeeks && !this.calendarWeeks) {
                                    const e = l(M).firstChild;
                                    (this.calendarWeeks = {
                                        element: e,
                                        dow: e.firstChild,
                                        weeks: e.lastChild,
                                    }),
                                        this.element.insertBefore(
                                            e,
                                            this.element.firstChild,
                                        );
                                } else
                                    this.calendarWeeks &&
                                        !e.calendarWeeks &&
                                        (this.element.removeChild(
                                            this.calendarWeeks.element,
                                        ),
                                        (this.calendarWeeks = null));
                            void 0 !== e.showDaysOfWeek &&
                                (e.showDaysOfWeek
                                    ? (u(this.dow),
                                      this.calendarWeeks &&
                                          u(this.calendarWeeks.dow))
                                    : (h(this.dow),
                                      this.calendarWeeks &&
                                          h(this.calendarWeeks.dow))),
                                t &&
                                    Array.from(this.dow.children).forEach(
                                        (e, t) => {
                                            const i = (this.weekStart + t) % 7;
                                            (e.textContent = this.dayNames[i]),
                                                (e.className =
                                                    this.daysOfWeekDisabled.includes(
                                                        i,
                                                    )
                                                        ? "dow disabled text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400 cursor-not-allowed"
                                                        : "dow text-center h-6 leading-6 text-sm font-medium text-gray-500 dark:text-gray-400");
                                        },
                                    );
                        }
                        updateFocus() {
                            const e = new Date(this.picker.viewDate),
                                t = e.getFullYear(),
                                i = e.getMonth(),
                                r = (0, n.by)(t, i, 1),
                                a = (0, n.fr)(
                                    r,
                                    this.weekStart,
                                    this.weekStart,
                                );
                            (this.first = r),
                                (this.last = (0, n.by)(t, i + 1, 0)),
                                (this.start = a),
                                (this.focused = this.picker.viewDate);
                        }
                        updateSelection() {
                            const { dates: e, rangepicker: t } =
                                this.picker.datepicker;
                            (this.selected = e), t && (this.range = t.dates);
                        }
                        render() {
                            (this.today = this.todayHighlight
                                ? (0, n.Lg)()
                                : void 0),
                                (this.disabled = [...this.datesDisabled]);
                            const e = (0, a.p6)(
                                this.focused,
                                this.switchLabelFormat,
                                this.locale,
                            );
                            if (
                                (this.picker.setViewSwitchLabel(e),
                                this.picker.setPrevBtnDisabled(
                                    this.first <= this.minDate,
                                ),
                                this.picker.setNextBtnDisabled(
                                    this.last >= this.maxDate,
                                ),
                                this.calendarWeeks)
                            ) {
                                const e = (0, n.fr)(this.first, 1, 1);
                                Array.from(
                                    this.calendarWeeks.weeks.children,
                                ).forEach((t, i) => {
                                    t.textContent = (0, n.Qk)((0, n.jh)(e, i));
                                });
                            }
                            Array.from(this.grid.children).forEach((e, t) => {
                                const i = e.classList,
                                    a = (0, n.E4)(this.start, t),
                                    s = new Date(a),
                                    o = s.getDay();
                                if (
                                    ((e.className = `datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm ${this.cellClass}`),
                                    (e.dataset.date = a),
                                    (e.textContent = s.getDate()),
                                    a < this.first
                                        ? i.add(
                                              "prev",
                                              "text-gray-500",
                                              "dark:text-white",
                                          )
                                        : a > this.last &&
                                          i.add(
                                              "next",
                                              "text-gray-500",
                                              "dark:text-white",
                                          ),
                                    this.today === a &&
                                        i.add(
                                            "today",
                                            "bg-gray-100",
                                            "dark:bg-gray-600",
                                        ),
                                    (a < this.minDate ||
                                        a > this.maxDate ||
                                        this.disabled.includes(a)) &&
                                        i.add("disabled", "cursor-not-allowed"),
                                    this.daysOfWeekDisabled.includes(o) &&
                                        (i.add(
                                            "disabled",
                                            "cursor-not-allowed",
                                        ),
                                        (0, r.$C)(this.disabled, a)),
                                    this.daysOfWeekHighlighted.includes(o) &&
                                        i.add("highlighted"),
                                    this.range)
                                ) {
                                    const [e, t] = this.range;
                                    a > e &&
                                        a < t &&
                                        (i.add(
                                            "range",
                                            "bg-gray-200",
                                            "dark:bg-gray-600",
                                        ),
                                        i.remove(
                                            "rounded-lg",
                                            "rounded-l-lg",
                                            "rounded-r-lg",
                                        )),
                                        a === e &&
                                            (i.add(
                                                "range-start",
                                                "bg-gray-100",
                                                "dark:bg-gray-600",
                                                "rounded-l-lg",
                                            ),
                                            i.remove(
                                                "rounded-lg",
                                                "rounded-r-lg",
                                            )),
                                        a === t &&
                                            (i.add(
                                                "range-end",
                                                "bg-gray-100",
                                                "dark:bg-gray-600",
                                                "rounded-r-lg",
                                            ),
                                            i.remove(
                                                "rounded-lg",
                                                "rounded-l-lg",
                                            ));
                                }
                                this.selected.includes(a) &&
                                    (i.add(
                                        "selected",
                                        "bg-blue-700",
                                        "text-white",
                                        "dark:bg-blue-600",
                                        "dark:text-white",
                                    ),
                                    i.remove(
                                        "text-gray-900",
                                        "text-gray-500",
                                        "hover:bg-gray-100",
                                        "dark:text-white",
                                        "dark:hover:bg-gray-600",
                                        "dark:bg-gray-600",
                                        "bg-gray-100",
                                        "bg-gray-200",
                                    )),
                                    a === this.focused && i.add("focused"),
                                    this.beforeShow &&
                                        this.performBeforeHook(e, a, a);
                            });
                        }
                        refresh() {
                            const [e, t] = this.range || [];
                            this.grid
                                .querySelectorAll(
                                    ".range, .range-start, .range-end, .selected, .focused",
                                )
                                .forEach((e) => {
                                    e.classList.remove(
                                        "range",
                                        "range-start",
                                        "range-end",
                                        "selected",
                                        "bg-blue-700",
                                        "text-white",
                                        "dark:bg-blue-600",
                                        "dark:text-white",
                                        "focused",
                                    ),
                                        e.classList.add(
                                            "text-gray-900",
                                            "rounded-lg",
                                            "dark:text-white",
                                        );
                                }),
                                Array.from(this.grid.children).forEach((i) => {
                                    const r = Number(i.dataset.date),
                                        n = i.classList;
                                    n.remove(
                                        "bg-gray-200",
                                        "dark:bg-gray-600",
                                        "rounded-l-lg",
                                        "rounded-r-lg",
                                    ),
                                        r > e &&
                                            r < t &&
                                            (n.add(
                                                "range",
                                                "bg-gray-200",
                                                "dark:bg-gray-600",
                                            ),
                                            n.remove("rounded-lg")),
                                        r === e &&
                                            (n.add(
                                                "range-start",
                                                "bg-gray-200",
                                                "dark:bg-gray-600",
                                                "rounded-l-lg",
                                            ),
                                            n.remove(
                                                "rounded-lg",
                                                "rounded-r-lg",
                                            )),
                                        r === t &&
                                            (n.add(
                                                "range-end",
                                                "bg-gray-200",
                                                "dark:bg-gray-600",
                                                "rounded-r-lg",
                                            ),
                                            n.remove(
                                                "rounded-lg",
                                                "rounded-l-lg",
                                            )),
                                        this.selected.includes(r) &&
                                            (n.add(
                                                "selected",
                                                "bg-blue-700",
                                                "text-white",
                                                "dark:bg-blue-600",
                                                "dark:text-white",
                                            ),
                                            n.remove(
                                                "text-gray-900",
                                                "hover:bg-gray-100",
                                                "dark:text-white",
                                                "dark:hover:bg-gray-600",
                                                "bg-gray-100",
                                                "bg-gray-200",
                                                "dark:bg-gray-600",
                                            )),
                                        r === this.focused && n.add("focused");
                                });
                        }
                        refreshFocus() {
                            const e = Math.round(
                                (this.focused - this.start) / 864e5,
                            );
                            this.grid
                                .querySelectorAll(".focused")
                                .forEach((e) => {
                                    e.classList.remove("focused");
                                }),
                                this.grid.children[e].classList.add("focused");
                        }
                    }
                    function C(e, t) {
                        if (!e || !e[0] || !e[1]) return;
                        const [[i, r], [n, a]] = e;
                        return i > t || n < t
                            ? void 0
                            : [i === t ? r : -1, n === t ? a : 12];
                    }
                    class E extends S {
                        constructor(e) {
                            super(e, {
                                id: 1,
                                name: "months",
                                cellClass: "month",
                            });
                        }
                        init(e, t = !0) {
                            t &&
                                ((this.grid = this.element),
                                this.element.classList.add(
                                    "months",
                                    "datepicker-grid",
                                    "w-64",
                                    "grid",
                                    "grid-cols-4",
                                ),
                                this.grid.appendChild(
                                    l(
                                        (0, r.em)("span", 12, {
                                            "data-month": (e) => e,
                                        }),
                                    ),
                                )),
                                super.init(e);
                        }
                        setOptions(e) {
                            if (
                                (e.locale &&
                                    (this.monthNames = e.locale.monthsShort),
                                (0, r.l$)(e, "minDate"))
                            )
                                if (void 0 === e.minDate)
                                    this.minYear =
                                        this.minMonth =
                                        this.minDate =
                                            void 0;
                                else {
                                    const t = new Date(e.minDate);
                                    (this.minYear = t.getFullYear()),
                                        (this.minMonth = t.getMonth()),
                                        (this.minDate = t.setDate(1));
                                }
                            if ((0, r.l$)(e, "maxDate"))
                                if (void 0 === e.maxDate)
                                    this.maxYear =
                                        this.maxMonth =
                                        this.maxDate =
                                            void 0;
                                else {
                                    const t = new Date(e.maxDate);
                                    (this.maxYear = t.getFullYear()),
                                        (this.maxMonth = t.getMonth()),
                                        (this.maxDate = (0, n.by)(
                                            this.maxYear,
                                            this.maxMonth + 1,
                                            0,
                                        ));
                                }
                            void 0 !== e.beforeShowMonth &&
                                (this.beforeShow =
                                    "function" == typeof e.beforeShowMonth
                                        ? e.beforeShowMonth
                                        : void 0);
                        }
                        updateFocus() {
                            const e = new Date(this.picker.viewDate);
                            (this.year = e.getFullYear()),
                                (this.focused = e.getMonth());
                        }
                        updateSelection() {
                            const { dates: e, rangepicker: t } =
                                this.picker.datepicker;
                            (this.selected = e.reduce((e, t) => {
                                const i = new Date(t),
                                    n = i.getFullYear(),
                                    a = i.getMonth();
                                return (
                                    void 0 === e[n]
                                        ? (e[n] = [a])
                                        : (0, r.$C)(e[n], a),
                                    e
                                );
                            }, {})),
                                t &&
                                    t.dates &&
                                    (this.range = t.dates.map((e) => {
                                        const t = new Date(e);
                                        return isNaN(t)
                                            ? void 0
                                            : [t.getFullYear(), t.getMonth()];
                                    }));
                        }
                        render() {
                            (this.disabled = []),
                                this.picker.setViewSwitchLabel(this.year),
                                this.picker.setPrevBtnDisabled(
                                    this.year <= this.minYear,
                                ),
                                this.picker.setNextBtnDisabled(
                                    this.year >= this.maxYear,
                                );
                            const e = this.selected[this.year] || [],
                                t =
                                    this.year < this.minYear ||
                                    this.year > this.maxYear,
                                i = this.year === this.minYear,
                                r = this.year === this.maxYear,
                                a = C(this.range, this.year);
                            Array.from(this.grid.children).forEach((s, o) => {
                                const d = s.classList,
                                    c = (0, n.by)(this.year, o, 1);
                                if (
                                    ((s.className = `datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm ${this.cellClass}`),
                                    this.isMinView && (s.dataset.date = c),
                                    (s.textContent = this.monthNames[o]),
                                    (t ||
                                        (i && o < this.minMonth) ||
                                        (r && o > this.maxMonth)) &&
                                        d.add("disabled"),
                                    a)
                                ) {
                                    const [e, t] = a;
                                    o > e && o < t && d.add("range"),
                                        o === e && d.add("range-start"),
                                        o === t && d.add("range-end");
                                }
                                e.includes(o) &&
                                    (d.add(
                                        "selected",
                                        "bg-blue-700",
                                        "text-white",
                                        "dark:bg-blue-600",
                                        "dark:text-white",
                                    ),
                                    d.remove(
                                        "text-gray-900",
                                        "hover:bg-gray-100",
                                        "dark:text-white",
                                        "dark:hover:bg-gray-600",
                                    )),
                                    o === this.focused && d.add("focused"),
                                    this.beforeShow &&
                                        this.performBeforeHook(s, o, c);
                            });
                        }
                        refresh() {
                            const e = this.selected[this.year] || [],
                                [t, i] = C(this.range, this.year) || [];
                            this.grid
                                .querySelectorAll(
                                    ".range, .range-start, .range-end, .selected, .focused",
                                )
                                .forEach((e) => {
                                    e.classList.remove(
                                        "range",
                                        "range-start",
                                        "range-end",
                                        "selected",
                                        "bg-blue-700",
                                        "dark:bg-blue-600",
                                        "dark:text-white",
                                        "text-white",
                                        "focused",
                                    ),
                                        e.classList.add(
                                            "text-gray-900",
                                            "hover:bg-gray-100",
                                            "dark:text-white",
                                            "dark:hover:bg-gray-600",
                                        );
                                }),
                                Array.from(this.grid.children).forEach(
                                    (r, n) => {
                                        const a = r.classList;
                                        n > t && n < i && a.add("range"),
                                            n === t && a.add("range-start"),
                                            n === i && a.add("range-end"),
                                            e.includes(n) &&
                                                (a.add(
                                                    "selected",
                                                    "bg-blue-700",
                                                    "text-white",
                                                    "dark:bg-blue-600",
                                                    "dark:text-white",
                                                ),
                                                a.remove(
                                                    "text-gray-900",
                                                    "hover:bg-gray-100",
                                                    "dark:text-white",
                                                    "dark:hover:bg-gray-600",
                                                )),
                                            n === this.focused &&
                                                a.add("focused");
                                    },
                                );
                        }
                        refreshFocus() {
                            this.grid
                                .querySelectorAll(".focused")
                                .forEach((e) => {
                                    e.classList.remove("focused");
                                }),
                                this.grid.children[this.focused].classList.add(
                                    "focused",
                                );
                        }
                    }
                    class F extends S {
                        constructor(e, t) {
                            super(e, t);
                        }
                        init(e, t = !0) {
                            var i;
                            t &&
                                ((this.navStep = 10 * this.step),
                                (this.beforeShowOption = `beforeShow${((i = this.cellClass), [...i].reduce((e, t, i) => e + (i ? t : t.toUpperCase()), ""))}`),
                                (this.grid = this.element),
                                this.element.classList.add(
                                    this.name,
                                    "datepicker-grid",
                                    "w-64",
                                    "grid",
                                    "grid-cols-4",
                                ),
                                this.grid.appendChild(
                                    l((0, r.em)("span", 12)),
                                )),
                                super.init(e);
                        }
                        setOptions(e) {
                            if (
                                ((0, r.l$)(e, "minDate") &&
                                    (void 0 === e.minDate
                                        ? (this.minYear = this.minDate = void 0)
                                        : ((this.minYear = (0, n.ak)(
                                              e.minDate,
                                              this.step,
                                          )),
                                          (this.minDate = (0, n.by)(
                                              this.minYear,
                                              0,
                                              1,
                                          )))),
                                (0, r.l$)(e, "maxDate") &&
                                    (void 0 === e.maxDate
                                        ? (this.maxYear = this.maxDate = void 0)
                                        : ((this.maxYear = (0, n.ak)(
                                              e.maxDate,
                                              this.step,
                                          )),
                                          (this.maxDate = (0, n.by)(
                                              this.maxYear,
                                              11,
                                              31,
                                          )))),
                                void 0 !== e[this.beforeShowOption])
                            ) {
                                const t = e[this.beforeShowOption];
                                this.beforeShow =
                                    "function" == typeof t ? t : void 0;
                            }
                        }
                        updateFocus() {
                            const e = new Date(this.picker.viewDate),
                                t = (0, n.ak)(e, this.navStep),
                                i = t + 9 * this.step;
                            (this.first = t),
                                (this.last = i),
                                (this.start = t - this.step),
                                (this.focused = (0, n.ak)(e, this.step));
                        }
                        updateSelection() {
                            const { dates: e, rangepicker: t } =
                                this.picker.datepicker;
                            (this.selected = e.reduce(
                                (e, t) => (0, r.$C)(e, (0, n.ak)(t, this.step)),
                                [],
                            )),
                                t &&
                                    t.dates &&
                                    (this.range = t.dates.map((e) => {
                                        if (void 0 !== e)
                                            return (0, n.ak)(e, this.step);
                                    }));
                        }
                        render() {
                            (this.disabled = []),
                                this.picker.setViewSwitchLabel(
                                    `${this.first}-${this.last}`,
                                ),
                                this.picker.setPrevBtnDisabled(
                                    this.first <= this.minYear,
                                ),
                                this.picker.setNextBtnDisabled(
                                    this.last >= this.maxYear,
                                ),
                                Array.from(this.grid.children).forEach(
                                    (e, t) => {
                                        const i = e.classList,
                                            r = this.start + t * this.step,
                                            a = (0, n.by)(r, 0, 1);
                                        if (
                                            ((e.className = `datepicker-cell hover:bg-gray-100 dark:hover:bg-gray-600 block flex-1 leading-9 border-0 rounded-lg cursor-pointer text-center text-gray-900 dark:text-white font-semibold text-sm ${this.cellClass}`),
                                            this.isMinView &&
                                                (e.dataset.date = a),
                                            (e.textContent = e.dataset.year =
                                                r),
                                            0 === t
                                                ? i.add("prev")
                                                : 11 === t && i.add("next"),
                                            (r < this.minYear ||
                                                r > this.maxYear) &&
                                                i.add("disabled"),
                                            this.range)
                                        ) {
                                            const [e, t] = this.range;
                                            r > e && r < t && i.add("range"),
                                                r === e && i.add("range-start"),
                                                r === t && i.add("range-end");
                                        }
                                        this.selected.includes(r) &&
                                            (i.add(
                                                "selected",
                                                "bg-blue-700",
                                                "text-white",
                                                "dark:bg-blue-600",
                                                "dark:text-white",
                                            ),
                                            i.remove(
                                                "text-gray-900",
                                                "hover:bg-gray-100",
                                                "dark:text-white",
                                                "dark:hover:bg-gray-600",
                                            )),
                                            r === this.focused &&
                                                i.add("focused"),
                                            this.beforeShow &&
                                                this.performBeforeHook(e, r, a);
                                    },
                                );
                        }
                        refresh() {
                            const [e, t] = this.range || [];
                            this.grid
                                .querySelectorAll(
                                    ".range, .range-start, .range-end, .selected, .focused",
                                )
                                .forEach((e) => {
                                    e.classList.remove(
                                        "range",
                                        "range-start",
                                        "range-end",
                                        "selected",
                                        "bg-blue-700",
                                        "text-white",
                                        "dark:bg-blue-600",
                                        "dark:text-white",
                                        "focused",
                                    );
                                }),
                                Array.from(this.grid.children).forEach((i) => {
                                    const r = Number(i.textContent),
                                        n = i.classList;
                                    r > e && r < t && n.add("range"),
                                        r === e && n.add("range-start"),
                                        r === t && n.add("range-end"),
                                        this.selected.includes(r) &&
                                            (n.add(
                                                "selected",
                                                "bg-blue-700",
                                                "text-white",
                                                "dark:bg-blue-600",
                                                "dark:text-white",
                                            ),
                                            n.remove(
                                                "text-gray-900",
                                                "hover:bg-gray-100",
                                                "dark:text-white",
                                                "dark:hover:bg-gray-600",
                                            )),
                                        r === this.focused && n.add("focused");
                                });
                        }
                        refreshFocus() {
                            const e = Math.round(
                                (this.focused - this.start) / this.step,
                            );
                            this.grid
                                .querySelectorAll(".focused")
                                .forEach((e) => {
                                    e.classList.remove("focused");
                                }),
                                this.grid.children[e].classList.add("focused");
                        }
                    }
                    function L(e, t) {
                        const i = {
                            date: e.getDate(),
                            viewDate: new Date(e.picker.viewDate),
                            viewId: e.picker.currentView.id,
                            datepicker: e,
                        };
                        e.element.dispatchEvent(
                            new CustomEvent(t, { detail: i }),
                        );
                    }
                    function V(e, t) {
                        const { minDate: i, maxDate: a } = e.config,
                            { currentView: s, viewDate: o } = e.picker;
                        let d;
                        switch (s.id) {
                            case 0:
                                d = (0, n.zI)(o, t);
                                break;
                            case 1:
                                d = (0, n.Bc)(o, t);
                                break;
                            default:
                                d = (0, n.Bc)(o, t * s.navStep);
                        }
                        (d = (0, r.jG)(d, i, a)),
                            e.picker.changeFocus(d).render();
                    }
                    function B(e) {
                        const t = e.picker.currentView.id;
                        t !== e.config.maxView &&
                            e.picker.changeView(t + 1).render();
                    }
                    function A(e) {
                        e.config.updateOnBlur
                            ? e.update({ autohide: !0 })
                            : (e.refresh("input"), e.hide());
                    }
                    function N(e, t) {
                        const i = e.picker,
                            r = new Date(i.viewDate),
                            a = i.currentView.id,
                            s =
                                1 === a
                                    ? (0, n.zI)(r, t - r.getMonth())
                                    : (0, n.Bc)(r, t - r.getFullYear());
                        i.changeFocus(s)
                            .changeView(a - 1)
                            .render();
                    }
                    function W(e) {
                        const t = e.picker,
                            i = (0, n.Lg)();
                        if (1 === e.config.todayBtnMode) {
                            if (e.config.autohide) return void e.setDate(i);
                            e.setDate(i, { render: !1 }), t.update();
                        }
                        t.viewDate !== i && t.changeFocus(i),
                            t.changeView(0).render();
                    }
                    function Y(e) {
                        e.setDate({ clear: !0 });
                    }
                    function $(e) {
                        B(e);
                    }
                    function j(e) {
                        V(e, -1);
                    }
                    function _(e) {
                        V(e, 1);
                    }
                    function H(e, t) {
                        const i = (0, s.He)(t, ".datepicker-cell");
                        if (!i || i.classList.contains("disabled")) return;
                        const { id: r, isMinView: n } = e.picker.currentView;
                        n
                            ? e.setDate(Number(i.dataset.date))
                            : N(
                                  e,
                                  Number(
                                      1 === r
                                          ? i.dataset.month
                                          : i.dataset.year,
                                  ),
                              );
                    }
                    function T(e) {
                        e.inline ||
                            e.config.disableTouchKeyboard ||
                            e.inputField.focus();
                    }
                    function K(e, t) {
                        if (
                            (void 0 !== t.title &&
                                (t.title
                                    ? ((e.controls.title.textContent = t.title),
                                      u(e.controls.title))
                                    : ((e.controls.title.textContent = ""),
                                      h(e.controls.title))),
                            t.prevArrow)
                        ) {
                            const i = e.controls.prevBtn;
                            g(i),
                                t.prevArrow.forEach((e) => {
                                    i.appendChild(e.cloneNode(!0));
                                });
                        }
                        if (t.nextArrow) {
                            const i = e.controls.nextBtn;
                            g(i),
                                t.nextArrow.forEach((e) => {
                                    i.appendChild(e.cloneNode(!0));
                                });
                        }
                        if (
                            (t.locale &&
                                ((e.controls.todayBtn.textContent =
                                    t.locale.today),
                                (e.controls.clearBtn.textContent =
                                    t.locale.clear)),
                            void 0 !== t.todayBtn &&
                                (t.todayBtn
                                    ? u(e.controls.todayBtn)
                                    : h(e.controls.todayBtn)),
                            (0, r.l$)(t, "minDate") || (0, r.l$)(t, "maxDate"))
                        ) {
                            const { minDate: t, maxDate: i } =
                                e.datepicker.config;
                            e.controls.todayBtn.disabled = !(0, r.mh)(
                                (0, n.Lg)(),
                                t,
                                i,
                            );
                        }
                        void 0 !== t.clearBtn &&
                            (t.clearBtn
                                ? u(e.controls.clearBtn)
                                : h(e.controls.clearBtn));
                    }
                    function I(e) {
                        const { dates: t, config: i } = e,
                            n = t.length > 0 ? (0, r.Jm)(t) : i.defaultViewDate;
                        return (0, r.jG)(n, i.minDate, i.maxDate);
                    }
                    function P(e, t) {
                        const i = new Date(e.viewDate),
                            r = new Date(t),
                            {
                                id: n,
                                year: a,
                                first: s,
                                last: o,
                            } = e.currentView,
                            d = r.getFullYear();
                        switch (
                            ((e.viewDate = t),
                            d !== i.getFullYear() &&
                                L(e.datepicker, "changeYear"),
                            r.getMonth() !== i.getMonth() &&
                                L(e.datepicker, "changeMonth"),
                            n)
                        ) {
                            case 0:
                                return t < s || t > o;
                            case 1:
                                return d !== a;
                            default:
                                return d < s || d > o;
                        }
                    }
                    function R(e) {
                        return window.getComputedStyle(e).direction;
                    }
                    class z {
                        constructor(e) {
                            this.datepicker = e;
                            const t = x.replace(
                                    /%buttonClass%/g,
                                    e.config.buttonClass,
                                ),
                                i = (this.element = l(t).firstChild),
                                [r, n, a] = i.firstChild.children,
                                o = r.firstElementChild,
                                [d, c, h] = r.lastElementChild.children,
                                [u, g] = a.firstChild.children,
                                f = {
                                    title: o,
                                    prevBtn: d,
                                    viewSwitch: c,
                                    nextBtn: h,
                                    todayBtn: u,
                                    clearBtn: g,
                                };
                            (this.main = n), (this.controls = f);
                            const p = e.inline ? "inline" : "dropdown";
                            i.classList.add(`datepicker-${p}`),
                                "dropdown" === p &&
                                    i.classList.add(
                                        "dropdown",
                                        "absolute",
                                        "top-0",
                                        "left-0",
                                        "z-50",
                                        "pt-2",
                                    ),
                                K(this, e.config),
                                (this.viewDate = I(e)),
                                (0, s.cF)(e, [
                                    [
                                        i,
                                        "click",
                                        T.bind(null, e),
                                        { capture: !0 },
                                    ],
                                    [n, "click", H.bind(null, e)],
                                    [f.viewSwitch, "click", $.bind(null, e)],
                                    [f.prevBtn, "click", j.bind(null, e)],
                                    [f.nextBtn, "click", _.bind(null, e)],
                                    [f.todayBtn, "click", W.bind(null, e)],
                                    [f.clearBtn, "click", Y.bind(null, e)],
                                ]),
                                (this.views = [
                                    new O(this),
                                    new E(this),
                                    new F(this, {
                                        id: 2,
                                        name: "years",
                                        cellClass: "year",
                                        step: 1,
                                    }),
                                    new F(this, {
                                        id: 3,
                                        name: "decades",
                                        cellClass: "decade",
                                        step: 10,
                                    }),
                                ]),
                                (this.currentView =
                                    this.views[e.config.startView]),
                                this.currentView.render(),
                                this.main.appendChild(this.currentView.element),
                                e.config.container.appendChild(this.element);
                        }
                        setOptions(e) {
                            K(this, e),
                                this.views.forEach((t) => {
                                    t.init(e, !1);
                                }),
                                this.currentView.render();
                        }
                        detach() {
                            this.datepicker.config.container.removeChild(
                                this.element,
                            );
                        }
                        show() {
                            if (this.active) return;
                            this.element.classList.add("active", "block"),
                                this.element.classList.remove("hidden"),
                                (this.active = !0);
                            const e = this.datepicker;
                            if (!e.inline) {
                                const t = R(e.inputField);
                                t !== R(e.config.container)
                                    ? (this.element.dir = t)
                                    : this.element.dir &&
                                      this.element.removeAttribute("dir"),
                                    this.place(),
                                    e.config.disableTouchKeyboard &&
                                        e.inputField.blur();
                            }
                            L(e, "show");
                        }
                        hide() {
                            this.active &&
                                (this.datepicker.exitEditMode(),
                                this.element.classList.remove(
                                    "active",
                                    "block",
                                ),
                                this.element.classList.add(
                                    "active",
                                    "block",
                                    "hidden",
                                ),
                                (this.active = !1),
                                L(this.datepicker, "hide"));
                        }
                        place() {
                            const { classList: e, style: t } = this.element,
                                { config: i, inputField: r } = this.datepicker,
                                n = i.container,
                                { width: a, height: s } =
                                    this.element.getBoundingClientRect(),
                                {
                                    left: o,
                                    top: d,
                                    width: c,
                                } = n.getBoundingClientRect(),
                                {
                                    left: l,
                                    top: h,
                                    width: u,
                                    height: g,
                                } = r.getBoundingClientRect();
                            let f,
                                p,
                                m,
                                { x: b, y: y } = i.orientation;
                            n === document.body
                                ? ((f = window.scrollY),
                                  (p = l + window.scrollX),
                                  (m = h + f))
                                : ((f = n.scrollTop),
                                  (p = l - o),
                                  (m = h - d + f)),
                                "auto" === b &&
                                    (p < 0
                                        ? ((b = "left"), (p = 10))
                                        : (b =
                                              p + a > c || "rtl" === R(r)
                                                  ? "right"
                                                  : "left")),
                                "right" === b && (p -= a - u),
                                "auto" === y &&
                                    (y = m - s < f ? "bottom" : "top"),
                                "top" === y ? (m -= s) : (m += g),
                                e.remove(
                                    "datepicker-orient-top",
                                    "datepicker-orient-bottom",
                                    "datepicker-orient-right",
                                    "datepicker-orient-left",
                                ),
                                e.add(
                                    `datepicker-orient-${y}`,
                                    `datepicker-orient-${b}`,
                                ),
                                (t.top = m ? `${m}px` : m),
                                (t.left = p ? `${p}px` : p);
                        }
                        setViewSwitchLabel(e) {
                            this.controls.viewSwitch.textContent = e;
                        }
                        setPrevBtnDisabled(e) {
                            this.controls.prevBtn.disabled = e;
                        }
                        setNextBtnDisabled(e) {
                            this.controls.nextBtn.disabled = e;
                        }
                        changeView(e) {
                            const t = this.currentView,
                                i = this.views[e];
                            return (
                                i.id !== t.id &&
                                    ((this.currentView = i),
                                    (this._renderMethod = "render"),
                                    L(this.datepicker, "changeView"),
                                    this.main.replaceChild(
                                        i.element,
                                        t.element,
                                    )),
                                this
                            );
                        }
                        changeFocus(e) {
                            return (
                                (this._renderMethod = P(this, e)
                                    ? "render"
                                    : "refreshFocus"),
                                this.views.forEach((e) => {
                                    e.updateFocus();
                                }),
                                this
                            );
                        }
                        update() {
                            const e = I(this.datepicker);
                            return (
                                (this._renderMethod = P(this, e)
                                    ? "render"
                                    : "refresh"),
                                this.views.forEach((e) => {
                                    e.updateFocus(), e.updateSelection();
                                }),
                                this
                            );
                        }
                        render(e = !0) {
                            const t = (e && this._renderMethod) || "render";
                            delete this._renderMethod, this.currentView[t]();
                        }
                    }
                    function q(e, t, i, n, a, s) {
                        if ((0, r.mh)(e, a, s)) {
                            if (n(e)) {
                                return q(t(e, i), t, i, n, a, s);
                            }
                            return e;
                        }
                    }
                    function J(e, t, i, r) {
                        const a = e.picker,
                            s = a.currentView,
                            o = s.step || 1;
                        let d,
                            c,
                            l = a.viewDate;
                        switch (s.id) {
                            case 0:
                                (l = r
                                    ? (0, n.E4)(l, 7 * i)
                                    : t.ctrlKey || t.metaKey
                                      ? (0, n.Bc)(l, i)
                                      : (0, n.E4)(l, i)),
                                    (d = n.E4),
                                    (c = (e) => s.disabled.includes(e));
                                break;
                            case 1:
                                (l = (0, n.zI)(l, r ? 4 * i : i)),
                                    (d = n.zI),
                                    (c = (e) => {
                                        const t = new Date(e),
                                            { year: i, disabled: r } = s;
                                        return (
                                            t.getFullYear() === i &&
                                            r.includes(t.getMonth())
                                        );
                                    });
                                break;
                            default:
                                (l = (0, n.Bc)(l, i * (r ? 4 : 1) * o)),
                                    (d = n.Bc),
                                    (c = (e) =>
                                        s.disabled.includes((0, n.ak)(e, o)));
                        }
                        (l = q(l, d, i < 0 ? -o : o, c, s.minDate, s.maxDate)),
                            void 0 !== l && a.changeFocus(l).render();
                    }
                    function G(e, t) {
                        if ("Tab" === t.key) return void A(e);
                        const i = e.picker,
                            { id: r, isMinView: n } = i.currentView;
                        if (i.active)
                            if (e.editMode)
                                switch (t.key) {
                                    case "Escape":
                                        i.hide();
                                        break;
                                    case "Enter":
                                        e.exitEditMode({
                                            update: !0,
                                            autohide: e.config.autohide,
                                        });
                                        break;
                                    default:
                                        return;
                                }
                            else
                                switch (t.key) {
                                    case "Escape":
                                        i.hide();
                                        break;
                                    case "ArrowLeft":
                                        if (t.ctrlKey || t.metaKey) V(e, -1);
                                        else {
                                            if (t.shiftKey)
                                                return void e.enterEditMode();
                                            J(e, t, -1, !1);
                                        }
                                        break;
                                    case "ArrowRight":
                                        if (t.ctrlKey || t.metaKey) V(e, 1);
                                        else {
                                            if (t.shiftKey)
                                                return void e.enterEditMode();
                                            J(e, t, 1, !1);
                                        }
                                        break;
                                    case "ArrowUp":
                                        if (t.ctrlKey || t.metaKey) B(e);
                                        else {
                                            if (t.shiftKey)
                                                return void e.enterEditMode();
                                            J(e, t, -1, !0);
                                        }
                                        break;
                                    case "ArrowDown":
                                        if (
                                            t.shiftKey &&
                                            !t.ctrlKey &&
                                            !t.metaKey
                                        )
                                            return void e.enterEditMode();
                                        J(e, t, 1, !0);
                                        break;
                                    case "Enter":
                                        n
                                            ? e.setDate(i.viewDate)
                                            : i.changeView(r - 1).render();
                                        break;
                                    case "Backspace":
                                    case "Delete":
                                        return void e.enterEditMode();
                                    default:
                                        return void (
                                            1 !== t.key.length ||
                                            t.ctrlKey ||
                                            t.metaKey ||
                                            e.enterEditMode()
                                        );
                                }
                        else
                            switch (t.key) {
                                case "ArrowDown":
                                case "Escape":
                                    i.show();
                                    break;
                                case "Enter":
                                    e.update();
                                    break;
                                default:
                                    return;
                            }
                        t.preventDefault(), t.stopPropagation();
                    }
                    function Z(e) {
                        e.config.showOnFocus && !e._showing && e.show();
                    }
                    function U(e, t) {
                        const i = t.target;
                        (e.picker.active || e.config.showOnClick) &&
                            ((i._active = i === document.activeElement),
                            (i._clicking = setTimeout(() => {
                                delete i._active, delete i._clicking;
                            }, 2e3)));
                    }
                    function Q(e, t) {
                        const i = t.target;
                        i._clicking &&
                            (clearTimeout(i._clicking),
                            delete i._clicking,
                            i._active && e.enterEditMode(),
                            delete i._active,
                            e.config.showOnClick && e.show());
                    }
                    function X(e, t) {
                        t.clipboardData.types.includes("text/plain") &&
                            e.enterEditMode();
                    }
                    function ee(e, t) {
                        const i = e.element;
                        if (i !== document.activeElement) return;
                        const r = e.picker.element;
                        (0, s.He)(t, (e) => e === i || e === r) || A(e);
                    }
                    function te(e, t) {
                        return e
                            .map((e) => (0, a.p6)(e, t.format, t.locale))
                            .join(t.dateDelimiter);
                    }
                    function ie(e, t, i = !1) {
                        const { config: n, dates: s, rangepicker: o } = e;
                        if (0 === t.length) return i ? [] : void 0;
                        const d = o && e === o.datepickers[1];
                        let c = t.reduce((e, t) => {
                            let i = (0, a.sG)(t, n.format, n.locale);
                            if (void 0 === i) return e;
                            if (n.pickLevel > 0) {
                                const e = new Date(i);
                                i =
                                    1 === n.pickLevel
                                        ? d
                                            ? e.setMonth(e.getMonth() + 1, 0)
                                            : e.setDate(1)
                                        : d
                                          ? e.setFullYear(
                                                e.getFullYear() + 1,
                                                0,
                                                0,
                                            )
                                          : e.setMonth(0, 1);
                            }
                            return (
                                !(0, r.mh)(i, n.minDate, n.maxDate) ||
                                    e.includes(i) ||
                                    n.datesDisabled.includes(i) ||
                                    n.daysOfWeekDisabled.includes(
                                        new Date(i).getDay(),
                                    ) ||
                                    e.push(i),
                                e
                            );
                        }, []);
                        return 0 !== c.length
                            ? (n.multidate &&
                                  !i &&
                                  (c = c.reduce(
                                      (e, t) => (s.includes(t) || e.push(t), e),
                                      s.filter((e) => !c.includes(e)),
                                  )),
                              n.maxNumberOfDates &&
                              c.length > n.maxNumberOfDates
                                  ? c.slice(-1 * n.maxNumberOfDates)
                                  : c)
                            : void 0;
                    }
                    function re(e, t = 3, i = !0) {
                        const { config: r, picker: n, inputField: a } = e;
                        if (2 & t) {
                            const e = n.active ? r.pickLevel : r.startView;
                            n.update().changeView(e).render(i);
                        }
                        1 & t && a && (a.value = te(e.dates, r));
                    }
                    function ne(e, t, i) {
                        let { clear: r, render: n, autohide: a } = i;
                        void 0 === n && (n = !0),
                            n
                                ? void 0 === a && (a = e.config.autohide)
                                : (a = !1);
                        const s = ie(e, t, r);
                        s &&
                            (s.toString() !== e.dates.toString()
                                ? ((e.dates = s),
                                  re(e, n ? 3 : 1),
                                  L(e, "changeDate"))
                                : re(e, 1),
                            a && e.hide());
                    }
                    class ae {
                        constructor(e, t = {}, i) {
                            (e.datepicker = this), (this.element = e);
                            const a = (this.config = Object.assign(
                                {
                                    buttonClass:
                                        (t.buttonClass &&
                                            String(t.buttonClass)) ||
                                        "button",
                                    container: document.body,
                                    defaultViewDate: (0, n.Lg)(),
                                    maxDate: void 0,
                                    minDate: void 0,
                                },
                                v(d, this),
                            ));
                            (this._options = t), Object.assign(a, v(t, this));
                            const o = (this.inline = "INPUT" !== e.tagName);
                            let c, l;
                            if (o)
                                (a.container = e),
                                    (l = (0, r.W7)(
                                        e.dataset.date,
                                        a.dateDelimiter,
                                    )),
                                    delete e.dataset.date;
                            else {
                                const i = t.container
                                    ? document.querySelector(t.container)
                                    : null;
                                i && (a.container = i),
                                    (c = this.inputField = e),
                                    c.classList.add("datepicker-input"),
                                    (l = (0, r.W7)(c.value, a.dateDelimiter));
                            }
                            if (i) {
                                const e = i.inputs.indexOf(c),
                                    t = i.datepickers;
                                if (e < 0 || e > 1 || !Array.isArray(t))
                                    throw Error("Invalid rangepicker object.");
                                (t[e] = this),
                                    Object.defineProperty(this, "rangepicker", {
                                        get() {
                                            return i;
                                        },
                                    });
                            }
                            this.dates = [];
                            const h = ie(this, l);
                            h && h.length > 0 && (this.dates = h),
                                c && (c.value = te(this.dates, a));
                            const u = (this.picker = new z(this));
                            if (o) this.show();
                            else {
                                const e = ee.bind(null, this),
                                    t = [
                                        [c, "keydown", G.bind(null, this)],
                                        [c, "focus", Z.bind(null, this)],
                                        [c, "mousedown", U.bind(null, this)],
                                        [c, "click", Q.bind(null, this)],
                                        [c, "paste", X.bind(null, this)],
                                        [document, "mousedown", e],
                                        [document, "touchstart", e],
                                        [window, "resize", u.place.bind(u)],
                                    ];
                                (0, s.cF)(this, t);
                            }
                        }
                        static formatDate(e, t, i) {
                            return (0, a.p6)(e, t, (i && o[i]) || o.en);
                        }
                        static parseDate(e, t, i) {
                            return (0, a.sG)(e, t, (i && o[i]) || o.en);
                        }
                        static get locales() {
                            return o;
                        }
                        get active() {
                            return !(!this.picker || !this.picker.active);
                        }
                        get pickerElement() {
                            return this.picker ? this.picker.element : void 0;
                        }
                        setOptions(e) {
                            const t = this.picker,
                                i = v(e, this);
                            Object.assign(this._options, e),
                                Object.assign(this.config, i),
                                t.setOptions(i),
                                re(this, 3);
                        }
                        show() {
                            if (this.inputField) {
                                if (this.inputField.disabled) return;
                                this.inputField !== document.activeElement &&
                                    ((this._showing = !0),
                                    this.inputField.focus(),
                                    delete this._showing);
                            }
                            this.picker.show();
                        }
                        hide() {
                            this.inline ||
                                (this.picker.hide(),
                                this.picker
                                    .update()
                                    .changeView(this.config.startView)
                                    .render());
                        }
                        destroy() {
                            return (
                                this.hide(),
                                (0, s.uV)(this),
                                this.picker.detach(),
                                this.inline ||
                                    this.inputField.classList.remove(
                                        "datepicker-input",
                                    ),
                                delete this.element.datepicker,
                                this
                            );
                        }
                        getDate(e) {
                            const t = e
                                ? (t) => (0, a.p6)(t, e, this.config.locale)
                                : (e) => new Date(e);
                            return this.config.multidate
                                ? this.dates.map(t)
                                : this.dates.length > 0
                                  ? t(this.dates[0])
                                  : void 0;
                        }
                        setDate(...e) {
                            const t = [...e],
                                i = {},
                                n = (0, r.Jm)(e);
                            "object" != typeof n ||
                                Array.isArray(n) ||
                                n instanceof Date ||
                                !n ||
                                Object.assign(i, t.pop());
                            ne(this, Array.isArray(t[0]) ? t[0] : t, i);
                        }
                        update(e) {
                            if (this.inline) return;
                            const t = {
                                clear: !0,
                                autohide: !(!e || !e.autohide),
                            };
                            ne(
                                this,
                                (0, r.W7)(
                                    this.inputField.value,
                                    this.config.dateDelimiter,
                                ),
                                t,
                            );
                        }
                        refresh(e, t = !1) {
                            let i;
                            e &&
                                "string" != typeof e &&
                                ((t = e), (e = void 0)),
                                (i =
                                    "picker" === e ? 2 : "input" === e ? 1 : 3),
                                re(this, i, !t);
                        }
                        enterEditMode() {
                            this.inline ||
                                !this.picker.active ||
                                this.editMode ||
                                ((this.editMode = !0),
                                this.inputField.classList.add(
                                    "in-edit",
                                    "border-blue-700",
                                ));
                        }
                        exitEditMode(e) {
                            if (this.inline || !this.editMode) return;
                            const t = Object.assign({ update: !1 }, e);
                            delete this.editMode,
                                this.inputField.classList.remove(
                                    "in-edit",
                                    "border-blue-700",
                                ),
                                t.update && this.update(t);
                        }
                    }
                },
                963: function (e, t, i) {
                    i.d(t, {
                        CL: function () {
                            return a;
                        },
                        p6: function () {
                            return f;
                        },
                        sG: function () {
                            return g;
                        },
                    });
                    var r = i(560),
                        n = i(105);
                    const a = /dd?|DD?|mm?|MM?|yy?(?:yy)?/,
                        s = /[\s!-/:-@[-`{-~年月日]+/;
                    let o = {};
                    const d = {
                            y(e, t) {
                                return new Date(e).setFullYear(parseInt(t, 10));
                            },
                            m(e, t, i) {
                                const r = new Date(e);
                                let n = parseInt(t, 10) - 1;
                                if (isNaN(n)) {
                                    if (!t) return NaN;
                                    const e = t.toLowerCase(),
                                        r = (t) =>
                                            t.toLowerCase().startsWith(e);
                                    if (
                                        ((n = i.monthsShort.findIndex(r)),
                                        n < 0 && (n = i.months.findIndex(r)),
                                        n < 0)
                                    )
                                        return NaN;
                                }
                                return (
                                    r.setMonth(n),
                                    r.getMonth() !== l(n)
                                        ? r.setDate(0)
                                        : r.getTime()
                                );
                            },
                            d(e, t) {
                                return new Date(e).setDate(parseInt(t, 10));
                            },
                        },
                        c = {
                            d(e) {
                                return e.getDate();
                            },
                            dd(e) {
                                return h(e.getDate(), 2);
                            },
                            D(e, t) {
                                return t.daysShort[e.getDay()];
                            },
                            DD(e, t) {
                                return t.days[e.getDay()];
                            },
                            m(e) {
                                return e.getMonth() + 1;
                            },
                            mm(e) {
                                return h(e.getMonth() + 1, 2);
                            },
                            M(e, t) {
                                return t.monthsShort[e.getMonth()];
                            },
                            MM(e, t) {
                                return t.months[e.getMonth()];
                            },
                            y(e) {
                                return e.getFullYear();
                            },
                            yy(e) {
                                return h(e.getFullYear(), 2).slice(-2);
                            },
                            yyyy(e) {
                                return h(e.getFullYear(), 4);
                            },
                        };
                    function l(e) {
                        return e > -1 ? e % 12 : l(e + 12);
                    }
                    function h(e, t) {
                        return e.toString().padStart(t, "0");
                    }
                    function u(e) {
                        if ("string" != typeof e)
                            throw new Error("Invalid date format.");
                        if (e in o) return o[e];
                        const t = e.split(a),
                            i = e.match(new RegExp(a, "g"));
                        if (0 === t.length || !i)
                            throw new Error("Invalid date format.");
                        const l = i.map((e) => c[e]),
                            h = Object.keys(d).reduce(
                                (e, t) => (
                                    i.find(
                                        (e) =>
                                            "D" !== e[0] &&
                                            e[0].toLowerCase() === t,
                                    ) && e.push(t),
                                    e
                                ),
                                [],
                            );
                        return (o[e] = {
                            parser(e, t) {
                                const n = e.split(s).reduce((e, t, r) => {
                                    if (t.length > 0 && i[r]) {
                                        const n = i[r][0];
                                        "M" === n
                                            ? (e.m = t)
                                            : "D" !== n && (e[n] = t);
                                    }
                                    return e;
                                }, {});
                                return h.reduce(
                                    (e, i) => {
                                        const r = d[i](e, n[i], t);
                                        return isNaN(r) ? e : r;
                                    },
                                    (0, r.Lg)(),
                                );
                            },
                            formatter(e, i) {
                                return (
                                    l.reduce(
                                        (r, n, a) => r + `${t[a]}${n(e, i)}`,
                                        "",
                                    ) + (0, n.Jm)(t)
                                );
                            },
                        });
                    }
                    function g(e, t, i) {
                        if (e instanceof Date || "number" == typeof e) {
                            const t = (0, r.xR)(e);
                            return isNaN(t) ? void 0 : t;
                        }
                        if (e) {
                            if ("today" === e) return (0, r.Lg)();
                            if (t && t.toValue) {
                                const n = t.toValue(e, t, i);
                                return isNaN(n) ? void 0 : (0, r.xR)(n);
                            }
                            return u(t).parser(e, i);
                        }
                    }
                    function f(e, t, i) {
                        if (isNaN(e) || (!e && 0 !== e)) return "";
                        const r = "number" == typeof e ? new Date(e) : e;
                        return t.toDisplay
                            ? t.toDisplay(r, t, i)
                            : u(t).formatter(r, i);
                    }
                },
                560: function (e, t, i) {
                    function r(e) {
                        return new Date(e).setHours(0, 0, 0, 0);
                    }
                    function n() {
                        return new Date().setHours(0, 0, 0, 0);
                    }
                    function a(...e) {
                        switch (e.length) {
                            case 0:
                                return n();
                            case 1:
                                return r(e[0]);
                        }
                        const t = new Date(0);
                        return t.setFullYear(...e), t.setHours(0, 0, 0, 0);
                    }
                    function s(e, t) {
                        const i = new Date(e);
                        return i.setDate(i.getDate() + t);
                    }
                    function o(e, t) {
                        return s(e, 7 * t);
                    }
                    function d(e, t) {
                        const i = new Date(e),
                            r = i.getMonth() + t;
                        let n = r % 12;
                        n < 0 && (n += 12);
                        const a = i.setMonth(r);
                        return i.getMonth() !== n ? i.setDate(0) : a;
                    }
                    function c(e, t) {
                        const i = new Date(e),
                            r = i.getMonth(),
                            n = i.setFullYear(i.getFullYear() + t);
                        return 1 === r && 2 === i.getMonth() ? i.setDate(0) : n;
                    }
                    function l(e, t) {
                        return (e - t + 7) % 7;
                    }
                    function h(e, t, i = 0) {
                        const r = new Date(e).getDay();
                        return s(e, l(t, i) - l(r, i));
                    }
                    function u(e) {
                        const t = h(e, 4, 1),
                            i = h(new Date(t).setMonth(0, 4), 4, 1);
                        return Math.round((t - i) / 6048e5) + 1;
                    }
                    function g(e, t) {
                        const i = new Date(e).getFullYear();
                        return Math.floor(i / t) * t;
                    }
                    i.d(t, {
                        Bc: function () {
                            return c;
                        },
                        E4: function () {
                            return s;
                        },
                        Lg: function () {
                            return n;
                        },
                        Qk: function () {
                            return u;
                        },
                        ak: function () {
                            return g;
                        },
                        by: function () {
                            return a;
                        },
                        fr: function () {
                            return h;
                        },
                        jh: function () {
                            return o;
                        },
                        xR: function () {
                            return r;
                        },
                        zI: function () {
                            return d;
                        },
                    });
                },
                698: function (e, t, i) {
                    i.d(t, {
                        He: function () {
                            return c;
                        },
                        cF: function () {
                            return s;
                        },
                        uV: function () {
                            return o;
                        },
                    });
                    const r = new WeakMap(),
                        { addEventListener: n, removeEventListener: a } =
                            EventTarget.prototype;
                    function s(e, t) {
                        let i = r.get(e);
                        i || ((i = []), r.set(e, i)),
                            t.forEach((e) => {
                                n.call(...e), i.push(e);
                            });
                    }
                    function o(e) {
                        let t = r.get(e);
                        t &&
                            (t.forEach((e) => {
                                a.call(...e);
                            }),
                            r.delete(e));
                    }
                    if (!Event.prototype.composedPath) {
                        const e = (t, i = []) => {
                            let r;
                            return (
                                i.push(t),
                                t.parentNode
                                    ? (r = t.parentNode)
                                    : t.host
                                      ? (r = t.host)
                                      : t.defaultView && (r = t.defaultView),
                                r ? e(r, i) : i
                            );
                        };
                        Event.prototype.composedPath = function () {
                            return e(this.target);
                        };
                    }
                    function d(e, t, i, r = 0) {
                        const n = e[r];
                        return t(n)
                            ? n
                            : n !== i && n.parentElement
                              ? d(e, t, i, r + 1)
                              : void 0;
                    }
                    function c(e, t) {
                        const i =
                            "function" == typeof t ? t : (e) => e.matches(t);
                        return d(e.composedPath(), i, e.currentTarget);
                    }
                },
                105: function (e, t, i) {
                    function r(e, t) {
                        return Object.prototype.hasOwnProperty.call(e, t);
                    }
                    function n(e) {
                        return e[e.length - 1];
                    }
                    function a(e, ...t) {
                        return (
                            t.forEach((t) => {
                                e.includes(t) || e.push(t);
                            }),
                            e
                        );
                    }
                    function s(e, t) {
                        return e ? e.split(t) : [];
                    }
                    function o(e, t, i) {
                        return (
                            (void 0 === t || e >= t) && (void 0 === i || e <= i)
                        );
                    }
                    function d(e, t, i) {
                        return e < t ? t : e > i ? i : e;
                    }
                    function c(e, t, i = {}, r = 0, n = "") {
                        n += `<${Object.keys(i).reduce((e, t) => {
                            let n = i[t];
                            return (
                                "function" == typeof n && (n = n(r)),
                                `${e} ${t}="${n}"`
                            );
                        }, e)}></${e}>`;
                        const a = r + 1;
                        return a < t ? c(e, t, i, a, n) : n;
                    }
                    function l(e) {
                        return e.replace(/>\s+/g, ">").replace(/\s+</, "<");
                    }
                    i.d(t, {
                        $C: function () {
                            return a;
                        },
                        Jm: function () {
                            return n;
                        },
                        W7: function () {
                            return s;
                        },
                        em: function () {
                            return c;
                        },
                        jG: function () {
                            return d;
                        },
                        l$: function () {
                            return r;
                        },
                        mh: function () {
                            return o;
                        },
                        zh: function () {
                            return l;
                        },
                    });
                },
                947: function (e, t) {
                    var i = (function () {
                        function e(e, t) {
                            void 0 === t && (t = []),
                                (this._eventType = e),
                                (this._eventFunctions = t);
                        }
                        return (
                            (e.prototype.init = function () {
                                var e = this;
                                this._eventFunctions.forEach(function (t) {
                                    "undefined" != typeof window &&
                                        window.addEventListener(
                                            e._eventType,
                                            t,
                                        );
                                });
                            }),
                            e
                        );
                    })();
                    t.default = i;
                },
            },
            t = {};
        function i(r) {
            var n = t[r];
            if (void 0 !== n) return n.exports;
            var a = (t[r] = { exports: {} });
            return e[r](a, a.exports, i), a.exports;
        }
        (i.d = function (e, t) {
            for (var r in t)
                i.o(t, r) &&
                    !i.o(e, r) &&
                    Object.defineProperty(e, r, { enumerable: !0, get: t[r] });
        }),
            (i.o = function (e, t) {
                return Object.prototype.hasOwnProperty.call(e, t);
            }),
            (i.r = function (e) {
                "undefined" != typeof Symbol &&
                    Symbol.toStringTag &&
                    Object.defineProperty(e, Symbol.toStringTag, {
                        value: "Module",
                    }),
                    Object.defineProperty(e, "__esModule", { value: !0 });
            });
        var r = {};
        return (
            (function () {
                i.r(r),
                    i.d(r, {
                        initDatepickers: function () {
                            return s;
                        },
                    });
                var e = i(770),
                    t = i(482),
                    n = i(947),
                    a = function (e) {
                        var t = e.hasAttribute("datepicker-buttons"),
                            i = e.hasAttribute("datepicker-autohide"),
                            r = e.hasAttribute("datepicker-format"),
                            n = e.hasAttribute("datepicker-orientation"),
                            a = e.hasAttribute("datepicker-title"),
                            s = {};
                        return (
                            t && ((s.todayBtn = !0), (s.clearBtn = !0)),
                            i && (s.autohide = !0),
                            r &&
                                (s.format =
                                    e.getAttribute("datepicker-format")),
                            n &&
                                (s.orientation = e.getAttribute(
                                    "datepicker-orientation",
                                )),
                            a && (s.title = e.getAttribute("datepicker-title")),
                            s
                        );
                    };
                function s() {
                    document
                        .querySelectorAll("[datepicker]")
                        .forEach(function (t) {
                            new e.Z(t, a(t));
                        }),
                        document
                            .querySelectorAll("[inline-datepicker]")
                            .forEach(function (t) {
                                new e.Z(t, a(t));
                            }),
                        document
                            .querySelectorAll("[date-rangepicker]")
                            .forEach(function (e) {
                                new t.Z(e, a(e));
                            });
                }
                new n.default("DOMContentLoaded", [s]).init();
            })(),
            r
        );
    })();
});
//# sourceMappingURL=datepicker.min.js.map
