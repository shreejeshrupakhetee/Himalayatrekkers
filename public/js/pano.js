var Panoscroll = function (e, t) { this.time, this.x = 0, this.speed = .01, this.container = document.querySelector(t), this.direction = 0, this.addHovers(), this.draw() }; Panoscroll.prototype.addHovers = function () { var e = document.createElement("div"); e.style.position = "absolute", e.className = "hover-zone-right", e.style.top = 0, e.style.right = 0, e.style.height = "100%", e.style.width = "10%", e.style.zIndex = 999, e.addEventListener("mouseover", this.onMouseOver.bind(this)), e.addEventListener("mouseout", this.onMouseOut.bind(this)); var t = document.createElement("div"); t.style.position = "absolute", t.className = "hover-zone-left", t.style.top = 0, t.style.left = 0, t.style.height = "100%", t.style.width = "10%", t.style.zIndex = 999, t.addEventListener("mouseover", this.onMouseOver.bind(this)), t.addEventListener("mouseout", this.onMouseOut.bind(this)), this.container.parentNode.parentNode.appendChild(t), this.container.parentNode.parentNode.appendChild(e) }, Panoscroll.prototype.draw = function () { window.innerWidth > 768 && requestAnimationFrame(this.draw.bind(this)); var e = (new Date).getTime(); this.time; this.time = e, (99 == this.x || this.x > 99) && (this.direction = -1), this.x < 1 && (this.direction = 1), this.x += this.speed * this.direction, this.setTranslate(this.x, this.container) }, Panoscroll.prototype.onMouseOver = function (e) { this.speed = .04, "hover-zone-right" == e.currentTarget.className && this.x < 99 && (this.direction = 1), "hover-zone-left" == e.currentTarget.className && this.x > 1 && (this.direction = -1) }, Panoscroll.prototype.onMouseOut = function () { this.speed = .2 }, Panoscroll.prototype.setTranslate = function (e, t) { t.style.backgroundPosition = e + "% 0" };
new Panoscroll("about.png", ".panocontain");
