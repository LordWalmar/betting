$ ->
  drawingBarChart = (data) ->
    # Split price 
    handlePrice = (price) ->
      i = undefined
      text = undefined
      textArray = undefined
      textArray = []
      text = price.toString()
      i = text.length - 1
      while i >= 0
        textArray.push text[i]
        i--
      if textArray.length > 3
        textArray.splice 3, 0, " "
        textArray.splice 7, 0, " "
        textArray.splice 11, 0, " "
        textArray.reverse()
        text = textArray.toString()
        text = text.replace(/\,/g, "").trim()
      text + " руб."

    price_format = (price_num) ->
      x = (price_num + "").split(".")
      x1 = x[0]
      rgx = /(\d+)(\d{3})/
      x1 = x1.replace(rgx, "$1 $2")  while rgx.test(x1)
      text = x1 + " руб."

    # Function for wrapper multiline text

    wrap = (text, width) ->
      text.each (el) ->
        text = d3.select(this)
        words = data.dataObj[el].name.split(/\s+/).reverse()
        word = undefined
        line = []
        lineNumber = 0
        lineHeight = 1 # ems
        y = text.attr("y")
        dy = parseFloat(text.attr("dy"))
        tspan = text.text(null).append("tspan").attr("x", 0).attr("y", 6).attr("dy", ".71em").attr("font-size", "14px")
        while word = words.pop()
          line.push word
          tspan.text line.join(" ")
          if tspan.node().getComputedTextLength() > width
            line.pop()
            tspan.text line.join(" ")
            line = [word]
            tspan = text.append("tspan").attr("x", 0).attr("y", y).attr("dy", ++lineNumber * lineHeight + dy + "em").attr("font-size", "14px").text(word)
        return

      return
    w = 795
    h = 395
    p = [
      20
      0
      20
      20
    ]
    x = d3.scale.ordinal().rangeRoundBands([
      0
      w - p[1] - p[3] - 85
    ])
    y = d3.scale.linear().range([
      0
      h - p[0] - p[2]
    ])
    svg = d3.select(".chart-canvas__bar").append("svg:svg").attr("class", "svg-chart_bar").attr("viewBox", "0 0 795 404").attr("perserveAspectRatio", "xMinYMid").attr("width", w).attr("height", h)
    causes = d3.layout.stack()([
      "total"
      "economy"
    ].map((cause) ->
      data.dataObj.map (d, el) ->
        if cause == 'total' 
          x: el
          y: +(d['economy'])
        else
          x: el
          y: +(d['total'] - d['economy'])

    ))
    x.domain causes[0].map((d) ->
      d.x
    )
    y.domain [
      0
      d3.max(causes[causes.length - 1], (d) ->
        d.y0 + d.y
      )
    ]
    rule = svg.append("svg:g").selectAll("g.rule").data(y.ticks(5)).enter().append("svg:g").attr("class", "rule").attr("transform", (d) ->
      "translate(0," + (h - p[2] - 20 - y(d)) + ")"
    )
    rule.append("svg:line").attr("x1", 90).attr("x2", w - p[1] - p[3]).style("stroke", (d) ->
      (if d then "#ccc" else "#9099A4")
    ).style "stroke-opacity", (d) ->
      (if d then .7 else null)

    rule.append("svg:text").attr("x", 0).attr("y", 10).attr("dy", ".35em").attr("font-size", "14px").attr("font-family", "\"PlumbMedium\"").text (d) ->
      handlePrice(d)

    # Add gradient

    createGradient = (i, x1, x2) ->
      gradient = svg.append("linearGradient").attr("x1", x1).attr("y1", "50%").attr("x2", x2).attr("y2", "50%").attr("id", "gradient" + i).attr("gradientUnits", "userSpaceOnUse")
      gradient.append("stop").attr("offset", "0").attr("stop-color", "#EF0D41").attr "stop-opacity", 1
      gradient.append("stop").attr("offset", "0.5").attr("stop-color", "#BE0E37").attr "stop-opacity", 1
      return

    z = d3.scale.ordinal().range([
      "url(#gradient)"
      "#C6A67A"
    ])
    #svg = canvas.append("svg:g").attr("transform", "translate(" + 35 + "," + (h - p[2] - 20) + ")")
    cause = svg.selectAll("g.cause").data(causes).enter().append("svg:g").attr("class", "cause").style("fill", (d, i) ->
      (if i is 0 then "url(#gradient0)" else "#C6A67A")
    ).style("stroke", "#fff").attr("transform", (d) ->
      "translate(85,0)"
    )
    rect = cause.selectAll("rect").data(Object).enter().append("svg:rect").attr("x", (d) ->
      x(d.x) + 30
    ).attr("y", (d) ->
      (h - p[2] - 20) - y(d.y0)
    ).attr("height", (d) ->
      y(d.y0)
    ).attr("width", 140).style("fill", (d, i) ->
      createGradient i, x(d.x) + 30, x(d.x) + 30 + 140
      (if d.y0 is 0 then "url(#gradient" + i + ")" else "#C6A67A")
    )

    rect.transition()
    .delay((d) ->
      if !d.y0 is 0 then 250 else 0
    ).duration((d) ->
      if !d.y0 is 0 then 450 else 400
    )
    .attr("y", (d) ->
      (h - p[2] - 20) - (y(d.y0) + y(d.y))
    ).attr("height", (d) ->
      y(d.y)
    )
    xAxis = d3.svg.axis().scale(x).orient("bottom")
    svg.append("g").attr("transform", "translate(" + 95 + "," + (h - p[2] - 20) + ")").attr("class", "x axis").call(xAxis).selectAll("text").attr("text-anchor", "left").data(x.domain()).call wrap, x.rangeBand()
    rect.on("mouseover", (innerValue, i) ->
      coordinateTooltip = undefined
      tooltip = undefined
      widthTooltip = undefined
      widthWindow = undefined
      $(this).css "cursor", "pointer"
      widthTooltip = $(this).closest(".statistics-barChart_item").find("chart-tooltip_wrap").outerWidth()
      coordinateTooltip = d3.event.pageX
      tooltip = $(".statistics-barChart_item .chart-tooltip_wrap")
      widthWindow = $(window).outerWidth()
      if widthWindow <= 1280
        if widthWindow <= 870
          k = widthWindow / 870
        else
          k = widthWindow / 1280
      else
        k = 1
      leftTooltip = $(this).offset().left - tooltip.width()/2 + (+this.getAttribute("width"))*k/2
      tooltip.css "left", leftTooltip + "px"
      paragraphTooltip = tooltip.css("top", d3.event.pageY - 65 + "px").css("display", "block").find("p")
      if innerValue.y0 == 0
        paragraphTooltip.text price_format(data.dataObj[i].economy)
      else
        paragraphTooltip.text price_format(data.dataObj[i].total - data.dataObj[i].economy)
      return
    ).on "mouseout", ->
       d3.select(".statistics-barChart_item .chart-tooltip_wrap").style "display", "none"
      return
    return

  responsiveChart = ->
    aspect = undefined
    chart = undefined
    container = undefined
    chart = $(".svg-chart_bar")
    aspect = chart.width() / chart.height()
    container = $(".chart-canvas__bar")
    $(window).on("resize", ->
      targetWidth = undefined
      targetWidth = container.width()
      chart.attr "width", targetWidth
      chart.attr "height", Math.round(targetWidth / aspect)
      return
    ).trigger "resize"
    return

  window.initChartBar = (data) ->
    drawingBarChart data
    responsiveChart()
    return