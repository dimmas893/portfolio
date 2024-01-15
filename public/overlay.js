!(function (e, t) {
    "object" == typeof exports && "object" == typeof module
        ? (module.exports = t(require("vue")))
        : "function" == typeof define && define.amd
        ? define("VueLoading", ["vue"], t)
        : "object" == typeof exports
        ? (exports.VueLoading = t(require("vue")))
        : (e.VueLoading = t(e.Vue));
})(this, (e) =>
    (() => {
        "use strict";
        var t = {
                657: (e, t) => {
                    Object.defineProperty(t, "__esModule", { value: !0 }),
                        (t.default = (e, t) => {
                            const i = e.__vccOpts || e;
                            for (const [e, n] of t) i[e] = n;
                            return i;
                        });
                },
                976: (t) => {
                    t.exports = e;
                },
            },
            i = {};
        function n(e) {
            var o = i[e];
            if (void 0 !== o) return o.exports;
            var a = (i[e] = { exports: {} });
            return t[e](a, a.exports, n), a.exports;
        }
        (n.d = (e, t) => {
            for (var i in t)
                n.o(t, i) &&
                    !n.o(e, i) &&
                    Object.defineProperty(e, i, { enumerable: !0, get: t[i] });
        }),
            (n.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
            (n.r = (e) => {
                "undefined" != typeof Symbol &&
                    Symbol.toStringTag &&
                    Object.defineProperty(e, Symbol.toStringTag, {
                        value: "Module",
                    }),
                    Object.defineProperty(e, "__esModule", { value: !0 });
            });
        var o = {};
        return (
            (() => {
                n.r(o),
                    n.d(o, {
                        Component: () => N,
                        LoadingPlugin: () => x,
                        default: () => L,
                        useLoading: () => k,
                    });
                var e = n(976);
                function t(t, i, n) {
                    let o =
                        arguments.length > 3 && void 0 !== arguments[3]
                            ? arguments[3]
                            : {};
                    const a = (0, e.h)(t, i, o),
                        r = document.createElement("div");
                    return (
                        r.classList.add("vld-container"),
                        n.appendChild(r),
                        (0, e.render)(a, r),
                        a.component
                    );
                }
                const i =
                        "undefined" != typeof window
                            ? window.HTMLElement
                            : Object,
                    a = ["aria-busy"],
                    r = { class: "vl-icon" };
                const l = {
                        mounted() {
                            this.enforceFocus &&
                                document.addEventListener(
                                    "focusin",
                                    this.focusIn
                                );
                        },
                        methods: {
                            focusIn(e) {
                                if (!this.isActive) return;
                                if (
                                    e.target === this.$el ||
                                    this.$el.contains(e.target)
                                )
                                    return;
                                let t = this.container
                                    ? this.container
                                    : this.isFullPage
                                    ? null
                                    : this.$el.parentElement;
                                (this.isFullPage ||
                                    (t && t.contains(e.target))) &&
                                    (e.preventDefault(), this.$el.focus());
                            },
                        },
                        beforeUnmount() {
                            document.removeEventListener(
                                "focusin",
                                this.focusIn
                            );
                        },
                    },
                    c = ["width", "height", "stroke"],
                    s = [
                        (0, e.createStaticVNode)(
                            '<g fill="none" fill-rule="evenodd"><g transform="translate(1 1)" stroke-width="2"><circle stroke-opacity=".25" cx="18" cy="18" r="18"></circle><path d="M36 18c0-9.94-8.06-18-18-18"><animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="0.8s" repeatCount="indefinite"></animateTransform></path></g></g>',
                            1
                        ),
                    ];
                const d = (0, e.defineComponent)({
                    name: "spinner",
                    props: {
                        color: { type: String, default: "#000" },
                        height: { type: Number, default: 64 },
                        width: { type: Number, default: 64 },
                    },
                });
                var u = n(657);
                const h = (0, u.default)(d, [
                        [
                            "render",
                            function (t, i, n, o, a, r) {
                                return (
                                    (0, e.openBlock)(),
                                    (0, e.createElementBlock)(
                                        "svg",
                                        {
                                            viewBox: "0 0 38 38",
                                            xmlns: "http://www.w3.org/2000/svg",
                                            width: t.width,
                                            height: t.height,
                                            stroke: t.color,
                                        },
                                        s,
                                        8,
                                        c
                                    )
                                );
                            },
                        ],
                    ]),
                    m = ["fill", "width", "height"],
                    p = [
                        (0, e.createStaticVNode)(
                            '<circle cx="15" cy="15" r="15"><animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate><animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate></circle><circle cx="60" cy="15" r="9" fill-opacity="0.3"><animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite"></animate><animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite"></animate></circle><circle cx="105" cy="15" r="15"><animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate><animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate></circle>',
                            3
                        ),
                    ];
                const f = (0, e.defineComponent)({
                        name: "dots",
                        props: {
                            color: { type: String, default: "#000" },
                            height: { type: Number, default: 240 },
                            width: { type: Number, default: 60 },
                        },
                    }),
                    g = (0, u.default)(f, [
                        [
                            "render",
                            function (t, i, n, o, a, r) {
                                return (
                                    (0, e.openBlock)(),
                                    (0, e.createElementBlock)(
                                        "svg",
                                        {
                                            viewBox: "0 0 120 30",
                                            xmlns: "http://www.w3.org/2000/svg",
                                            fill: t.color,
                                            width: t.width,
                                            height: t.height,
                                        },
                                        p,
                                        8,
                                        m
                                    )
                                );
                            },
                        ],
                    ]),
                    v = ["height", "width", "fill"],
                    b = [
                        (0, e.createStaticVNode)(
                            '<rect x="0" y="13" width="4" height="5"><animate attributeName="height" attributeType="XML" values="5;21;5" begin="0s" dur="0.6s" repeatCount="indefinite"></animate><animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0s" dur="0.6s" repeatCount="indefinite"></animate></rect><rect x="10" y="13" width="4" height="5"><animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate><animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.15s" dur="0.6s" repeatCount="indefinite"></animate></rect><rect x="20" y="13" width="4" height="5"><animate attributeName="height" attributeType="XML" values="5;21;5" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate><animate attributeName="y" attributeType="XML" values="13; 5; 13" begin="0.3s" dur="0.6s" repeatCount="indefinite"></animate></rect>',
                            3
                        ),
                    ];
                const y = (0, e.defineComponent)({
                        name: "bars",
                        props: {
                            color: { type: String, default: "#000" },
                            height: { type: Number, default: 40 },
                            width: { type: Number, default: 40 },
                        },
                    }),
                    w = {
                        Spinner: h,
                        Dots: g,
                        Bars: (0, u.default)(y, [
                            [
                                "render",
                                function (t, i, n, o, a, r) {
                                    return (
                                        (0, e.openBlock)(),
                                        (0, e.createElementBlock)(
                                            "svg",
                                            {
                                                xmlns: "http://www.w3.org/2000/svg",
                                                viewBox: "0 0 30 30",
                                                height: t.height,
                                                width: t.width,
                                                fill: t.color,
                                            },
                                            b,
                                            8,
                                            v
                                        )
                                    );
                                },
                            ],
                        ]),
                    },
                    S = (0, e.defineComponent)({
                        name: "VueLoading",
                        mixins: [l],
                        props: {
                            active: Boolean,
                            programmatic: Boolean,
                            container: [Object, Function, i],
                            isFullPage: { type: Boolean, default: !0 },
                            enforceFocus: { type: Boolean, default: !0 },
                            lockScroll: Boolean,
                            transition: { type: String, default: "fade" },
                            canCancel: Boolean,
                            onCancel: { type: Function, default: () => {} },
                            color: String,
                            backgroundColor: String,
                            opacity: Number,
                            width: Number,
                            height: Number,
                            zIndex: Number,
                            loader: { type: String, default: "spinner" },
                        },
                        components: w,
                        emits: ["hide", "update:active"],
                        data() {
                            return { isActive: this.active };
                        },
                        mounted() {
                            document.addEventListener("keyup", this.keyPress);
                        },
                        methods: {
                            cancel() {
                                this.canCancel &&
                                    this.isActive &&
                                    (this.hide(),
                                    this.onCancel.apply(null, arguments));
                            },
                            hide() {
                                this.$emit("hide"),
                                    this.$emit("update:active", !1),
                                    this.programmatic &&
                                        ((this.isActive = !1),
                                        setTimeout(() => {
                                            const t = this.$el.parentElement;
                                            var i;
                                            (0, e.render)(null, t),
                                                void 0 !== (i = t).remove
                                                    ? i.remove()
                                                    : i.parentNode?.removeChild(
                                                          i
                                                      );
                                        }, 150));
                            },
                            disableScroll() {
                                this.isFullPage &&
                                    this.lockScroll &&
                                    document.body.classList.add("vl-shown");
                            },
                            enableScroll() {
                                this.isFullPage &&
                                    this.lockScroll &&
                                    document.body.classList.remove("vl-shown");
                            },
                            keyPress(e) {
                                27 === e.keyCode && this.cancel();
                            },
                        },
                        watch: {
                            active(e) {
                                this.isActive = e;
                            },
                            isActive(e) {
                                e ? this.disableScroll() : this.enableScroll();
                            },
                        },
                        computed: {
                            bgStyle() {
                                return {
                                    background: this.backgroundColor,
                                    opacity: this.opacity,
                                };
                            },
                        },
                        beforeUnmount() {
                            document.removeEventListener(
                                "keyup",
                                this.keyPress
                            );
                        },
                    }),
                    C = (0, u.default)(S, [
                        [
                            "render",
                            function (t, i, n, o, l, c) {
                                return (
                                    (0, e.openBlock)(),
                                    (0, e.createBlock)(
                                        e.Transition,
                                        { name: t.transition },
                                        {
                                            default: (0, e.withCtx)(() => [
                                                (0, e.withDirectives)(
                                                    (0, e.createElementVNode)(
                                                        "div",
                                                        {
                                                            tabindex: "0",
                                                            class: (0,
                                                            e.normalizeClass)([
                                                                "vl-overlay vl-active",
                                                                {
                                                                    "vl-full-page":
                                                                        t.isFullPage,
                                                                },
                                                            ]),
                                                            "aria-busy":
                                                                t.isActive,
                                                            "aria-label":
                                                                "Loading",
                                                            style: (0,
                                                            e.normalizeStyle)({
                                                                zIndex: t.zIndex,
                                                            }),
                                                        },
                                                        [
                                                            (0,
                                                            e.createElementVNode)(
                                                                "div",
                                                                {
                                                                    class: "vl-background",
                                                                    onClick:
                                                                        i[0] ||
                                                                        (i[0] =
                                                                            (0,
                                                                            e.withModifiers)(
                                                                                function () {
                                                                                    return (
                                                                                        t.cancel &&
                                                                                        t.cancel(
                                                                                            ...arguments
                                                                                        )
                                                                                    );
                                                                                },
                                                                                [
                                                                                    "prevent",
                                                                                ]
                                                                            )),
                                                                    style: (0,
                                                                    e.normalizeStyle)(
                                                                        t.bgStyle
                                                                    ),
                                                                },
                                                                null,
                                                                4
                                                            ),
                                                            (0,
                                                            e.createElementVNode)(
                                                                "div",
                                                                r,
                                                                [
                                                                    (0,
                                                                    e.renderSlot)(
                                                                        t.$slots,
                                                                        "before"
                                                                    ),
                                                                    (0,
                                                                    e.renderSlot)(
                                                                        t.$slots,
                                                                        "default",
                                                                        {},
                                                                        () => [
                                                                            ((0,
                                                                            e.openBlock)(),
                                                                            (0,
                                                                            e.createBlock)(
                                                                                (0,
                                                                                e.resolveDynamicComponent)(
                                                                                    t.loader
                                                                                ),
                                                                                {
                                                                                    color: t.color,
                                                                                    width: t.width,
                                                                                    height: t.height,
                                                                                },
                                                                                null,
                                                                                8,
                                                                                [
                                                                                    "color",
                                                                                    "width",
                                                                                    "height",
                                                                                ]
                                                                            )),
                                                                        ]
                                                                    ),
                                                                    (0,
                                                                    e.renderSlot)(
                                                                        t.$slots,
                                                                        "after"
                                                                    ),
                                                                ]
                                                            ),
                                                        ],
                                                        14,
                                                        a
                                                    ),
                                                    [[e.vShow, t.isActive]]
                                                ),
                                            ]),
                                            _: 3,
                                        },
                                        8,
                                        ["name"]
                                    )
                                );
                            },
                        ],
                    ]),
                    N = C;
                function k() {
                    let e =
                            arguments.length > 0 && void 0 !== arguments[0]
                                ? arguments[0]
                                : {},
                        i =
                            arguments.length > 1 && void 0 !== arguments[1]
                                ? arguments[1]
                                : {};
                    return {
                        show() {
                            let n =
                                    arguments.length > 0 &&
                                    void 0 !== arguments[0]
                                        ? arguments[0]
                                        : e,
                                o =
                                    arguments.length > 1 &&
                                    void 0 !== arguments[1]
                                        ? arguments[1]
                                        : i;
                            const a = {
                                ...e,
                                ...n,
                                programmatic: !0,
                                lockScroll: !0,
                                isFullPage: !1,
                                active: !0,
                            };
                            let r = a.container;
                            a.container ||
                                ((r = document.body), (a.isFullPage = !0));
                            const l = { ...i, ...o };
                            return { hide: t(N, a, r, l).ctx.hide };
                        },
                    };
                }
                const x = function (e) {
                        let t =
                                arguments.length > 1 && void 0 !== arguments[1]
                                    ? arguments[1]
                                    : {},
                            i =
                                arguments.length > 2 && void 0 !== arguments[2]
                                    ? arguments[2]
                                    : {};
                        const n = k(t, i);
                        (e.config.globalProperties.$loading = n),
                            e.provide("$loading", n);
                    },
                    L = C;
            })(),
            o
        );
    })()
);
