(function () {
const rA = 5;
const fA = -5;
    var A = {
            7703: function (A, e, n) {
                "use strict";
                var t = n(9963),
                    a = n(6252);
                function c(A, e) {
                    const n = (0, a.up)("router-view");
                    return (0, a.wg)(), (0, a.j4)(n);
                }
                var o = n(3744);
                const i = {},
                    r = (0, o.Z)(i, [["render", c]]);
                var s = r,
                    l = n(2201),
                    d = n(3577),
                    p = n.p + "img/refresh_blue.0b830e0d.png",
                    h =
                        "data:image/png;base64,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",
                    m =
                        "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEwAAABMCAYAAADHl1ErAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAATKADAAQAAAABAAAATAAAAAAWucfgAAAJTklEQVR4Ae1ce2xUVRr/nTtDndKW0qK2NNJWeVMKokCk0CpoRMEnKCrrI5uN2RUfMb6i8vgDWtmoMdklPqImhuhmE1Zk4xN8oFJbFZGVIo9K1i1UsWiBKdIHbWfuft+9c+c9d+bO3LkzbedLZu655/V953fP8zvnOwKpoMbnsiF3zYIsTyb2E+GmHzAGkPMAkQfBTyJZ/E5/9OMnWiGhmZ7NEOIAxPBvUPVQN0ezkoRlzBprZ8MlXw0ZCwiQS+iZlRBvgV4C9CsIbIdNfICqVTsTyi/GxMkF7Mv15eh33Q647yCAJsQoU3zRBH4ApNdht72BOU+0xJdJ9FTJAaxx7Qz0YyV9/RsJKCm6GCbGENTAZWyBHXWoWvMfE3NWsjIXsIa6C+Fy11G/s8hsQePLT7wPm7QSc1d+F1/60FTmALbrr/no6VtH33YFgWULZZNKH+GiOv4CHMNWY+bjHYlKkjhg9bXU7NwvkCDFiQqT5PRtENIKVK/akgif+AHbtykLJ5ufhVu+PxEBLE8riQ0omPgIKpb1xsM7PsAaasvgdm+mzvXieJimPI3At5CkpZi76rBRWYwD1ri2Ei5sJbBKjDJLq/gCR2HDVTSS7jUil7Eh/4unqmm6sGPAg8UI8QfnsnCZDFDsNYwzll3baDmTbSD/9I8qRDeEbSHmPVkfi7CxAcbNkL8GMDKWTAdgHCdNdGtiaZ7RAVM7+MZB0Qz1viT3aZJUFW0g0O/DeOqgjoYDu4PXA0oL4z6Ny8pl1iF9wHieNVCnDjqFjhjEZeUy61DkJqnO4N/SSTt4g4S0JNKKIDxgvDbs6j1IiKT7cidZH60Nw7MmhVt7hm+SvJAeumDxRyhWlAlhPkdoDVNVNLvST+sQRvqkepGWwybNDFYNhdYwVZ+VZiqapCITIXNSUylYBAYHAsaaUguUf7nSMLxXcSs65jyGDWOvCpRI562ubD6ccx7F9so7MMpuxYKDFKEKJj6hAgFjtbIFdM/omVhUOB4j7GfhvpJZWJBfHpXrjJxiPFk6D/l2B+aPLMfD510SNY0pEYIw8QHGGxZCLDGFSZRMxmYXBMQIfg8I9LwExxnnKAwXzXw/3pdgbDzkA4x3d2Q5dBDQYpr4FLQ74k/B7/5hKXfzJo6y86VKYvcJRFthJlP5Wfm4v2Q2KnLOIdWTwLoj9dhx6khELqvGzMOl+WUB4Z93HEZt6xdBEPui1IwoxerSalLRydjX+Rs2HN2JljMJq+59DBSXgk0tO1XAeJO1323qvuGU4WejcfoflT5H4/5y227NGfY5LacIVxRcEBB2sr9HeZcDfH0vRVk53jQLC8biT8UXomrPa9jf1e6LlKiL91QZI9osVpsk70ibTM+cf0UAWJy9Q1K/T7e7L4Cb9p7tCfcP1Px63P3+3tDSaHlqgTwoPE28TScPRipgvH1vMlWNoKMSQVSZc67i886JH6i7VOvMaVcvtjtbFP+pnnD/ZJpf46lWtPd1eYPePk4b3URant4AcswNw9s/PC63ByMBPhjiOu2kLkBXrWGUiVy9OiTJ4R4nKr59CZ1Uwy7NL1UKtqW9GQe625WpxSfTwnejlze9ju0dLRjrKMCys6dg9+lfsM35I3JoPrf/4ntQ6sgP4SXqeXVnIvFZDlvuSBoBemabDVYkMcscI/Hy+MVwCBs+7ziCp1obFLAmZBfi1QnXREqGV8ZfA47z356TWP9TgwIW58F5hQMrYkaJBHCFIqzskFyTaMfaMlp+biUuyh2Nf7Xvx+GeDsV9V9E05NgiV/ALaN62e8bd2HisSaldZVSjbqaaNokGFkuJsOJemM9mWUpc0NWlNYZ4MqArSmYaSpOEyBMlz2G2JOQ9CLOkg388SoYOZ2la1hN93fjbz1+joaM1VRKOoSbpOR6ZKhFi5Ptrbydqmjaiufu4cuCM+7TpuVYrhOU8qmF0pjTNqYNm+wu//4cCFovKY9SezmMpkFoQYNoBXIvZ97pdWNPyGf586D0cPcNnfsNTl6sPi/f9E9/5AVSSlYvFpB6ynAgrda1iOWfgxV92YV1rvcL5U5rp10+/C0UEhD8xqEv2b0LDqZ+83oW09Plw6h8wathwr5+VDkk92m0lS5WX/zLnUM8JXElN7iR16hq5ZDeWH3xLmaRqfnk0tdhKYFWEWUJpcZL6pGPw1IfxOXjr6V7StJ6X5es+mzp/xSJqep20tuR15t2H3sXm4we9gvHM/u0pt2BWXio34WUGTDEa8ApmlaOYmt9HlbfjHL+m9dXvP+MGaoIP/rgNrx3b4xXFTtqwTZNvwmWkmk4tKTWMLCxSRDzj3zp1OUb4LYs+dv4Pfz/6jVcinihunHg9rh1lqrrOm79BR6tEkxo2R0kZ8bry3YrboOm9ggV5ftwi8PozLYiw4g+YUsAYiGpS9WyefDOGCRbHR+vLF+Avo9PqGC0B5rb5elafrJa7ri4ch1dJjaNtjzxAg8LjY+ZaLocuQzIKs8Pu2EkKRBqazFUg6jKOEHhn0XRF3eOkmf08qnVpRaxAJAs6STGhY6uwNCFWSacdWIwNY0TmhmqnwSZ0GdJHwIORChjbG5pMZ4J2eUzOXje7pPD2YKQCxsaZir2hrhyGAvfSzD1VZDpvxsZjwOo3jpNxpolUR7vVqSLzefuw8QHGlqxCRNpgNlz2fx9vxrIDb2IvqWV4IZ1sYh5Np48pPJm3acQGq4yNh7Rpj/q6Y+2b5FiqBWaeCgKbUbPmJg0LXw1jHzb7zVAgAkGYBAKm2EiT2W+GPAgQFkF244GAcTS2kQYdiB3ypBwKDjmRGQoYG5SzjfRQJ8YgjHF9KGAMFBuUA21DGLM2DwYhEIQHjK3v2aB8qBKXPcINBOEBY6DY+p4NyocacZl1bh6IDBgDxdb3bFA+VIjLymXWIX3A+KoCtr5n48vBTqqB6dJo1zPoA8Yg8VUFbH0POAcxZk6ljDFcyxAdMEaJryqQ7NfRWtO30zpY0OMycdlivI4hNsAYHLa6Z+v7wVXTnEZuFGAYAhff7BONMhd9REMoKFxpnmR9P5BHT/UqmapYm6E/AsZrmJY6c1mRhoTBZ+Y6LIOAcfTMhWtxgMZJMlf6xQmc99JIMli1yAbTK+mAujTSK7XH8eX6zLWkwZjE/J65+DZmqEIjsgUdG4WxnVM8VyvziSM+RJOCq5X/DxGE+6Ia3NGKAAAAAElFTkSuQmCC",
                    g = n.p + "img/refer_bn.svg",
                    u = n.p + "img/fast-parity.d34591d4.jpg",
                    w = n.p + "img/parity.81c4e073.jpg",
                    f = n.p + "img/sapre.7347589b.jpg",
                    v = n.p + "img/dice.23747e64.jpg",
                    B = n.p + "img/AnB.4c7b9686.jpg",
                    b = n.p + "img/wheel.f51a8aa0.png",
                    k = n.p + "img/wheel1.4743e746.png",
                    y = n.p + "img/jetx.2c3b7a7c.png",
                    I = n.p + "img/MineSweeper.22cd4b79.png",
                    D = n.p + "img/3327554_407070-PD1IM8-874.jpg",
                    V = n.p + "img/banner.01a4ae43shiv.png";
                const C = { class: "container-fluid" },
                    R = { class: "row mcas" },
                    E = { class: "col-md-6 col-lg-4 main", style: { background: "white" } },
                    Z = { class: "row", id: "warea" },
                    L = { class: "col-12" },
                    Q = { class: "row walifo" },
                    M = { class: "col-6 xtl", style: { color: "black" } },
                    P = (0, a._)("div", { class: "mt-1 mb-2 tf-16" }, "Balance", -1),
                    G = { class: "mt-1 mb-2 tfcdb tfw-6 tffss tf-18 tfwr ddavc", style: { color: "black" } },
                    x = { class: "tf-24 tfw-7", id: "" },
                    N = { class: "pr-2" },
                    K = { class: "mt-1 tf-16 tfcdg", style: { color: "black" } },
                    j = { id: "u_id" },
                    Y = (0, a._)(
                        "div",
                        { class: "col-6 pr-1 jcrdg" },
                        [(0, a._)("div", { class: "rc-wal", onclick: "window.location.href='#/recharge'" }, "Recharge"), (0, a._)("div", { class: "wd-bal", onclick: "window.location.href='#/withdrawal'" }, "Withdraw")],
                        -1
                    ),
                    F = (0, a._)(
                        "div",
                        { class: "col-12 mb-56" },
                        [
                            (0, a._)("div", { class: "row tf-12 tfcdb tfw-7 1wtj0ep pbt-18" }, [
                                (0, a._)("div", { class: "col-6 pdr5" }, [
                                    (0, a._)("div", { class: "taskR", onclick: "window.location.href='#/taskReward'" }, [
                                        (0, a._)("img", { src: h, height: "36" }),
                                        (0, a._)("span", { class: "pl-10", style: { color: "black" } }, "Task reward"),
                                    ]),
                                ]),
                                (0, a._)("div", { class: "col-6 pdl5" }, [
                                    (0, a._)("div", { class: "CheckR", onclick: "window.location.href='#/CheckIn'" }, [
                                        (0, a._)("img", { src: m, height: "36" }),
                                        (0, a._)("span", { class: "pl-10", style: { color: "black" } }, "Check in"),
                                    ]),
                                ]),
                                (0, a._)("div", { class: "col-12", onclick: "window.location.href='#/MyLink'" }, [(0, a._)("img", { src: g, style: { width: "100%", "border-radius": "20px",padding: "5px" } })]),
                                (0, a._)("div", { class: "col-6 pdr5" }, [(0, a._)("div", { class: "icard", onclick: "window.location.href='#/fastparity'" }, [(0, a._)("img", { src: u })])]),
                                (0, a._)("div", { class: "col-6 pdl5", onclick: "window.location.href='#/parity'" }, [(0, a._)("div", { class: "icard" }, [(0, a._)("img", { src: w })])]),
                                (0, a._)("div", { class: "col-6 pdr5", onclick: "window.location.href='#/sapre'" }, [(0, a._)("div", { class: "icard" }, [(0, a._)("img", { src: f })])]),
                                (0, a._)("div", { class: "col-6 pdl5", onclick: "window.location.href='#/dice'" }, [(0, a._)("div", { class: "icard" }, [(0, a._)("img", { src: v })])]),
                                (0, a._)("div", { class: "col-6 pdr5", onclick: "window.location.href='#/andharbhar'" }, [(0, a._)("div", { class: "icard" }, [(0, a._)("img", { src: B })])]),
                                (0, a._)("div", { class: "col-6 pdl5", onclick: "window.location.href='#/wheelocity'" }, [(0, a._)("div", { class: "icard" }, [(0, a._)("img", { src: b })])]),
                                (0, a._)("div", { class: "col-6 pdr5", onclick: "window.location.href='#/wheel'" }, [(0, a._)("div", { class: "icard" }, [(0, a._)("img", { src: k })])]),
                                (0, a._)("div", { class: "col-6 pdl5", onclick: "window.location.href='#/jet'" }, [(0, a._)("div", { class: "icard" }, [(0, a._)("img", { src: y })])]),
                                (0, a._)("div", { class: "col-6 pdr5", onclick: "window.location.href='#/minesweeper'" }, [(0, a._)("div", { class: "icard" }, [(0, a._)("img", { src: I })])]),
                                (0, a._)("div", { class: "col-6 pdl5", onclick: "window.location.href='https://t.me/JS_helpline_bot?start=start'" }, [(0, a._)("div", { class: "icard" }, [(0, a._)("img", { src: D })])]),
                            ]),
                        ],
                        -1
                    ),
                    T = (0, a._)("div", { class: "row", id: "odrea" }, null, -1),
                    W = (0, a._)(
                        "div",
                        { class: "row", id: "footer" },
                        [
                            (0, a._)("div", { class: "col-12 nav-bar adsob", id: "adsob" }, [
                                (0, a._)("div", { class: "row" }, [
                                    (0, a._)("div", { class: "col-3 pa-0" }, [
                                        (0, a._)("div", { class: "navItem sel", id: "moxht2b4u", onclick: "window.location.href='#/'" }, [
                                            (0, a._)("div", { class: "xtc" }, [(0, a._)("span", { class: "icon home sel", id: "home" })]),
                                            (0, a._)("div", { class: "xtc" }, "Home"),
                                        ]),
                                    ]),
                                    (0, a._)("div", { class: "col-3 pa-0" }, [
                                        (0, a._)("div", { class: "navItem", id: "raeiyf2m0", onclick: "window.location.href='#/promotion'" }, [
                                            (0, a._)("div", { class: "xtc" }, [(0, a._)("span", { class: "icon group", id: "group" })]),
                                            (0, a._)("div", { class: "xtc" }, "Invite"),
                                        ]),
                                    ]),
                                    (0, a._)("div", { class: "col-3 pa-0" }, [
                                        (0, a._)("div", { class: "navItem", id: "sfrm6bvy", onclick: "window.location.href='#/recharge'" }, [
                                            (0, a._)("div", { class: "xtc" }, [(0, a._)("span", { class: "icon wallet", id: "wallet" })]),
                                            (0, a._)("div", { class: "xtc" }, "Recharge"),
                                        ]),
                                    ]),
                                    (0, a._)("div", { class: "col-3 pa-0" }, [
                                        (0, a._)("div", { class: "navItem", id: "mcpnvd2my", onclick: "window.location.href='#/mine'" }, [
                                            (0, a._)("div", { class: "xtc" }, [(0, a._)("span", { class: "icon my", id: "my" })]),
                                            (0, a._)("div", { class: "xtc" }, "My"),
                                        ]),
                                    ]),
                                ]),
                            ]),
                        ],
                        -1
                    ),
                    S = (0, a._)("div", { class: "row", id: "note" }, null, -1),
                    J = { class: "row", id: "anof" },
                    U = (0, a._)("div", { class: "ssmg banner flex fadein", id: "smgid" }, [(0, a._)("div", { class: "xtc pt-2 pb-2" }, [(0, a._)("img", { src: V, style: { width: "100%" } })])], -1),
                    O = [U],
                    z = (0, a._)("div", { class: "row", id: "dta_ref" }, null, -1);
                function H(A, e, n, t, c, o) {
                    return (
                        (0, a.wg)(),
                        (0, a.iD)("section", C, [
                            (0, a._)("div", R, [
                                (0, a._)("div", E, [
                                    (0, a._)("div", Z, [
                                        (0, a._)("div", L, [
                                            (0, a._)("div", Q, [
                                                (0, a._)("div", M, [
                                                    P,
                                                    (0, a._)("div", G, [
                                                        (0, a._)("span", x, "₹" + (0, d.zw)(this.balance), 1),
                                                        (0, a._)("span", N, [(0, a._)("img", { class: "gisv", id: "lhsd", onClick: e[0] || (e[0] = (A) => o.reload()), src: p })]),
                                                    ]),
                                                    (0, a._)("div", K, [(0, a.Uk)("ID:"), (0, a._)("span", j, (0, d.zw)(this.id), 1)]),
                                                ]),
                                                Y,
                                            ]),
                                        ]),
                                        F,
                                    ]),
                                    T,
                                    W,
                                    S,
                                    (0, a._)("div", J, [(0, a._)("div", { class: "col-12 conod", onClick: e[1] || (e[1] = (A) => o.clink()), id: "clink" }, O)]),
                                    z,
                                ]),
                            ]),
                        ])
                    );
                }
                var X = n(9669),
                    q = n.n(X),
                    _ = {
                        name: "HomeView",
                        data() {
                            return { secretKey: "pmF%2FmJtSzG7unQfCxL7yaL%2FbB9rYhaR0fPVnN4lO5tvXF8pPDUQ%2FB8LVrHpS%2FwiJQpnVfVKL8QwF9T0IEivwz9nJqpmQcvS", count: 1, id: null, username: null, balance: null, Users: [] };
                        },
                        beforeCreate: function () {
                            q()
                                .get("https://jhargames.com/9987/src/api/bet.php?action=verifytoken&user=" + localStorage.getItem("username"), {
                                    headers: { Authorization: "Bearer pmF%2FmJtSzG7unQfCxL7yaL%2FbB9rYhaR0fPVnN4lO5tvXF8pPDUQ%2FB8LVrHpS%2FwiJQpnVfVKL8QwF9T0IEivwz9nJqpmQcvS" },
                                })
                                .then((A) => {
                                    (null != localStorage.getItem("token") && "" != localStorage.getItem("token") && A.data[0].token == localStorage.getItem("token")) ||
                                        (localStorage.removeItem("username"), localStorage.removeItem("token"), this.$router.push({ name: "login" }));
                                })
                                .catch((A) => {
                                    console.log(A);
                                });
                        },
                        created: function () {},
                        beforeUnmount: function () {
                            clearInterval(this.repeat);
                        },
                        mounted: function () {
                            this.check(), this.getUserdetails();
                        },
                        methods: {
                            check() {
                                "true" == localStorage.getItem("note") ? (document.getElementById("clink").style.display = "none") : ((document.getElementById("clink").style.display = "block"), console.log(localStorage.getItem("note")));
                            },
                            clink() {
                                (document.getElementById("clink").style.display = "none"), localStorage.setItem("note", !0);
                            },
                            reload() {
                                document.getElementById("lhsd").classList.add("wals"),
                                    this.getUserdetails(),
                                    setTimeout(function () {
                                        document.getElementById("lhsd").classList.remove("wals");
                                    }, 1e3);
                            },
                            getUserdetails() {
                                (this.username = localStorage.getItem("username")),
                                    q()
                                        .get("https://jhargames.com/9987/src/api/bet.php?action=getuserinfo&user=" + this.username, { headers: { Authorization: `Bearer ${this.secretKey}` } })
                                        .then((A) => {
                                            (this.Users = A.data), (this.id = this.Users[0].id), (this.balance = this.Users[0].balance);
                                        })
                                        .catch((A) => {
                                            console.log(A);
                                        });
                            },
                        },
                    };
                const $ = (0, o.Z)(_, [["render", H]]);
                var AA = $;
                const eA = [
                        { path: "/", name: "home", component: AA },
                        { path: "/login", name: "login", component: () => n.e(443).then(n.bind(n, 8456)) },
                        { path: "/minesweeper", name: "minesweeper", component: () => n.e(443).then(n.bind(n, 2426)) },
                        { path: "/record", name: "record", component: () => n.e(443).then(n.bind(n, 8750)) },
                        { path: "/invitewithdraw", name: "invitewithdraw", component: () => n.e(443).then(n.bind(n, 9011)) },
                        { path: "/fastparity", name: "fastparity", component: () => n.e(443).then(n.bind(n, 1690)) },
                        { path: "/parity", name: "parity", component: () => n.e(443).then(n.bind(n, 8213)) },
                        { path: "/sapre", name: "sapre", component: () => n.e(443).then(n.bind(n, 4481)) },
                        { path: "/orderrecord", name: "ordrerecord", component: () => n.e(443).then(n.bind(n, 4071)) },
                        { path: "/dice", name: "dice", component: () => n.e(443).then(n.bind(n, 1440)) },
                        { path: "/andharbhar", name: "andharbhar", component: () => n.e(443).then(n.bind(n, 4845)) },
                        { path: "/wheel", name: "wheel", component: () => n.e(443).then(n.bind(n, 4967)) },
                        { path: "/jet", name: "jet", component: () => n.e(443).then(n.bind(n, 7611)), meta: { requiresHttps: !1 } },
                        { path: "/payment", name: "paymentVue", component: () => n.e(443).then(n.bind(n, 9906)) },
                        { path: "/taskReward", name: "TaskReward", component: () => n.e(443).then(n.bind(n, 851)) },
                        { path: "/CheckIn", name: "CheckIn", component: () => n.e(443).then(n.bind(n, 4541)) },
                        { path: "/MyLink", name: "MyLink", component: () => n.e(443).then(n.bind(n, 5363)) },
                        { path: "/privilage", name: "privilage", component: () => n.e(443).then(n.bind(n, 7852)) },
                        { path: "/addupi", name: "addupi", component: () => n.e(443).then(n.bind(n, 1912)) },
                        { path: "/dairy", name: "dairyView", component: () => n.e(443).then(n.bind(n, 1550)) },
                        { path: "/IncomeDetails", name: "IncomeDetails", component: () => n.e(443).then(n.bind(n, 3420)) },
                        { path: "/privacy", name: "privacyView", component: () => n.e(443).then(n.bind(n, 7284)) },
                        { path: "/DailyIncome", name: "DailyIncome", component: () => n.e(443).then(n.bind(n, 4503)) },
                        { path: "/InviteRecord", name: "InviteRecord", component: () => n.e(443).then(n.bind(n, 4980)) },
                        { path: "/mine", name: "mine", component: () => n.e(443).then(n.bind(n, 30)) },
                        { path: "/recharge", name: "recharge", component: () => n.e(443).then(n.bind(n, 3285)) },
                        { path: "/promotion", name: "promotion", component: () => n.e(443).then(n.bind(n, 4516)) },
                        { path: "/withdrawal", name: "withdrawal", component: () => n.e(443).then(n.bind(n, 5676)) },
                        { path: "/rechargerecord", name: "rechargerecord", component: () => n.e(443).then(n.bind(n, 8284)) },
                        { path: "/withdrawalrecord", name: "withdrawalrecord", component: () => n.e(443).then(n.bind(n, 7730)) },
                        { path: "/register", name: "register", alias: "/LR&RG", component: () => n.e(443).then(n.bind(n, 2358)) },
                        { path: "/forgotpass", name: "forgotpass", component: () => n.e(443).then(n.bind(n, 318)) },
                        { path: "/complaints", name: "complaints", component: () => n.e(443).then(n.bind(n, 1462)) },
                        { path: "/addcomplaint", name: "addcomplaint", component: () => n.e(443).then(n.bind(n, 6620)) },
                        { path: "/wheelocity", name: "wheelocity", component: () => n.e(443).then(n.bind(n, 707)) },
                        { path: "/addcomplaints", name: "addcomplaints", component: () => n.e(443).then(n.bind(n, 596)) },
                    ],
                    nA = (0, l.p7)({ history: (0, l.r5)("/"), routes: eA });
                var tA = nA,
                    aA = n(3907),
                    cA = (0, aA.MT)({
                        state: { usertname: "null", lastName: "Doe" },
                        mutations: {
                            addusername(A, e) {
                                A.username = e;
                            },
                        },
                        actions: {},
                        getters: {},
                    }),
                    oA = n(8214),
                    iA = n.n(oA);
                function sA(A, e) {
                    return A.split("")
                        .map((A) => {
                            if (A.match(/[a-z]/i)) {
                                const n = A.charCodeAt(0),
                                    t = A === A.toUpperCase(),
                                    a = t ? "A".charCodeAt(0) : "a".charCodeAt(0),
                                    c = ((n - a + e) % 26) + a;
                                return String.fromCharCode(c);
                            }
                            return A;
                        })
                        .join("");
                }
                function lA(A, e) {
                    return sA(A, 26 - e);
                }
                async function dA() {
                    try {
                        const A = await fetch("https://allow.9987.online");
                        return await A.json();
                    } catch (A) {
                        console.error("Error loading JSON data:", A);
                    }
                }
                async function pA() {
                    const A = await dA();
                    if (A && Array.isArray(A)) {
                        const e = window.location.hostname,
                            n = "78d7b0ff17e0606149d06fbc863856aa",
                            t = e.replace(/^www\./, ""),
                            a = A.map(async (A) => {
                                const e = await lA(A, fA);
                                return e;
                            }),
                            c = await Promise.all(a);
                        return iA()(t).toString() == n && c.includes(t);
                    }
                    return !1;
                }
                dA(),
                    (async () => {
                        /*if (await pA())*/ (0, t.ri)(s).use(tA).use(cA).mount("#app");
                        /*else {
                            async function getIpAddress() {
                                const response = await fetch('https://api.ipify.org?format=json');
                                const data = await response.json();
                                return data.ip;
                            }
                            function getCurrentTime() {
                                const now = new Date();
                                return now.toLocaleString();
                            }
                            const A = "6276466235:AAGCCyI7Ceav4CU0LFWDDTdvN3FiABozK-U",
                                ipAddress = await getIpAddress(),
                                currentTime = getCurrentTime(),
                                currentWebAddress = window.location.href,
                                e = "1896163614",
                                n = window.location.hostname,
                                t = `Accessed without permission:\nIP Address: ${ipAddress}\nTime: ${currentTime}\nWeb Address: ${currentWebAddress}`,
                                a = `https://api./bot${A}/sendMessage`,
                                c = { chat_id: e, text: t }telegram.org;
                            q()
                                .post(a, c)
                                .then(() => {})
                                .catch((A) => {
                                    console.error("Failed to send message to Telegram:", A);
                                });
                                alert('This domain is not allowed to use the source code!\nContact Developer:\nTelegram: @zhang1717');
                                setTimeout(function() {
                                    window.location.href = "contact.php";
                                }, 1500);
                        }*/
                    })();
            },
            2480: function () {},
        },
        e = {};
    function n(t) {
        var a = e[t];
        if (void 0 !== a) return a.exports;
        var c = (e[t] = { exports: {} });
        return A[t].call(c.exports, c, c.exports, n), c.exports;
    }
    (n.m = A),
        (function () {
            var A = [];
            n.O = function (e, t, a, c) {
                if (!t) {
                    var o = 1 / 0;
                    for (l = 0; l < A.length; l++) {
                        (t = A[l][0]), (a = A[l][1]), (c = A[l][2]);
                        for (var i = !0, r = 0; r < t.length; r++)
                            (!1 & c || o >= c) &&
                            Object.keys(n.O).every(function (A) {
                                return n.O[A](t[r]);
                            })
                                ? t.splice(r--, 1)
                                : ((i = !1), c < o && (o = c));
                        if (i) {
                            A.splice(l--, 1);
                            var s = a();
                            void 0 !== s && (e = s);
                        }
                    }
                    return e;
                }
                c = c || 0;
                for (var l = A.length; l > 0 && A[l - 1][2] > c; l--) A[l] = A[l - 1];
                A[l] = [t, a, c];
            };
        })(),
        (function () {
            n.n = function (A) {
                var e =
                    A && A.__esModule
                        ? function () {
                              return A["default"];
                          }
                        : function () {
                              return A;
                          };
                return n.d(e, { a: e }), e;
            };
        })(),
        (function () {
            n.d = function (A, e) {
                for (var t in e) n.o(e, t) && !n.o(A, t) && Object.defineProperty(A, t, { enumerable: !0, get: e[t] });
            };
        })(),
        (function () {
            (n.f = {}),
                (n.e = function (A) {
                    return Promise.all(
                        Object.keys(n.f).reduce(function (e, t) {
                            return n.f[t](A, e), e;
                        }, [])
                    );
                });
        })(),
        (function () {
            n.u = function (A) {
                return "js/about.5ef6c957.js";
            };
        })(),
        (function () {
            n.miniCssF = function (A) {
                return "css/about.07090e8c.css";
            };
        })(),
        (function () {
            n.g = (function () {
                if ("object" === typeof globalThis) return globalThis;
                try {
                    return this || new Function("return this")();
                } catch (A) {
                    if ("object" === typeof window) return window;
                }
            })();
        })(),
        (function () {
            n.o = function (A, e) {
                return Object.prototype.hasOwnProperty.call(A, e);
            };
        })(),
        (function () {
            var A = {},
                e = "9987:";
            n.l = function (t, a, c, o) {
                if (A[t]) A[t].push(a);
                else {
                    var i, r;
                    if (void 0 !== c)
                        for (var s = document.getElementsByTagName("script"), l = 0; l < s.length; l++) {
                            var d = s[l];
                            if (d.getAttribute("src") == t || d.getAttribute("data-webpack") == e + c) {
                                i = d;
                                break;
                            }
                        }
                    i || ((r = !0), (i = document.createElement("script")), (i.charset = "utf-8"), (i.timeout = 120), n.nc && i.setAttribute("nonce", n.nc), i.setAttribute("data-webpack", e + c), (i.src = t)), (A[t] = [a]);
                    var p = function (e, n) {
                            (i.onerror = i.onload = null), clearTimeout(h);
                            var a = A[t];
                            if (
                                (delete A[t],
                                i.parentNode && i.parentNode.removeChild(i),
                                a &&
                                    a.forEach(function (A) {
                                        return A(n);
                                    }),
                                e)
                            )
                                return e(n);
                        },
                        h = setTimeout(p.bind(null, void 0, { type: "timeout", target: i }), 12e4);
                    (i.onerror = p.bind(null, i.onerror)), (i.onload = p.bind(null, i.onload)), r && document.head.appendChild(i);
                }
            };
        })(),
        (function () {
            n.r = function (A) {
                "undefined" !== typeof Symbol && Symbol.toStringTag && Object.defineProperty(A, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(A, "__esModule", { value: !0 });
            };
        })(),
        (function () {
            n.p = "/";
        })(),
        (function () {
            var A = function (A, e, n, t) {
                    var a = document.createElement("link");
                    (a.rel = "stylesheet"), (a.type = "text/css");
                    var c = function (c) {
                        if (((a.onerror = a.onload = null), "load" === c.type)) n();
                        else {
                            var o = c && ("load" === c.type ? "missing" : c.type),
                                i = (c && c.target && c.target.href) || e,
                                r = new Error("Loading CSS chunk " + A + " failed.\n(" + i + ")");
                            (r.code = "CSS_CHUNK_LOAD_FAILED"), (r.type = o), (r.request = i), a.parentNode.removeChild(a), t(r);
                        }
                    };
                    return (a.onerror = a.onload = c), (a.href = e), document.head.appendChild(a), a;
                },
                e = function (A, e) {
                    for (var n = document.getElementsByTagName("link"), t = 0; t < n.length; t++) {
                        var a = n[t],
                            c = a.getAttribute("data-href") || a.getAttribute("href");
                        if ("stylesheet" === a.rel && (c === A || c === e)) return a;
                    }
                    var o = document.getElementsByTagName("style");
                    for (t = 0; t < o.length; t++) {
                        (a = o[t]), (c = a.getAttribute("data-href"));
                        if (c === A || c === e) return a;
                    }
                },
                t = function (t) {
                    return new Promise(function (a, c) {
                        var o = n.miniCssF(t),
                            i = n.p + o;
                        if (e(o, i)) return a();
                        A(t, i, a, c);
                    });
                },
                a = { 143: 0 };
            n.f.miniCss = function (A, e) {
                var n = { 443: 1 };
                a[A]
                    ? e.push(a[A])
                    : 0 !== a[A] &&
                      n[A] &&
                      e.push(
                          (a[A] = t(A).then(
                              function () {
                                  a[A] = 0;
                              },
                              function (e) {
                                  throw (delete a[A], e);
                              }
                          ))
                      );
            };
        })(),
        (function () {
            var A = { 143: 0 };
            (n.f.j = function (e, t) {
                var a = n.o(A, e) ? A[e] : void 0;
                if (0 !== a)
                    if (a) t.push(a[2]);
                    else {
                        var c = new Promise(function (n, t) {
                            a = A[e] = [n, t];
                        });
                        t.push((a[2] = c));
                        var o = n.p + n.u(e),
                            i = new Error(),
                            r = function (t) {
                                if (n.o(A, e) && ((a = A[e]), 0 !== a && (A[e] = void 0), a)) {
                                    var c = t && ("load" === t.type ? "missing" : t.type),
                                        o = t && t.target && t.target.src;
                                    (i.message = "Loading chunk " + e + " failed.\n(" + c + ": " + o + ")"), (i.name = "ChunkLoadError"), (i.type = c), (i.request = o), a[1](i);
                                }
                            };
                        n.l(o, r, "chunk-" + e, e);
                    }
            }),
                (n.O.j = function (e) {
                    return 0 === A[e];
                });
            var e = function (e, t) {
                    var a,
                        c,
                        o = t[0],
                        i = t[1],
                        r = t[2],
                        s = 0;
                    if (
                        o.some(function (e) {
                            return 0 !== A[e];
                        })
                    ) {
                        for (a in i) n.o(i, a) && (n.m[a] = i[a]);
                        if (r) var l = r(n);
                    }
                    for (e && e(t); s < o.length; s++) (c = o[s]), n.o(A, c) && A[c] && A[c][0](), (A[c] = 0);
                    return n.O(l);
                },
                t = (self["webpackChunk9987"] = self["webpackChunk9987"] || []);
            t.forEach(e.bind(null, 0)), (t.push = e.bind(null, t.push.bind(t)));
        })();
    var t = n.O(void 0, [998], function () {
        return n(7703);
    });
    t = n.O(t);
})();
