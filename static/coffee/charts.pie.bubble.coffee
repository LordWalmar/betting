$ ->
  drawingBubbleChart = (data, $is_homePage) ->
    # Set the dimensions of the canvas / graph
    
    # Parse the date / time
    
    # Set the ranges

    wrap_bubble_x = (text, width) ->
      switchYear = true
      year = 0
      text.each (el) ->
        text = d3.select(this)
        if el !=-1 and el != data.date.length
          words = data.date[el].split(/\s+/).reverse()
          words[1] = words[1].slice(0,3)
          if el == 0
            year = words[0]
          if el>0
            if words[0] > year and switchYear
              year =  words[0]
              switchYear = false
            else
              words[0] = ''
          word = undefined
          line = []
          lineNumber = 0
          lineHeight = 1.2 # ems
          dy = parseFloat(text.attr("dy"))
          $y_position_first = 6
          $y_position_second = 30
          if $is_homePage
            $y_position_first = -13
            $y_position_second = -18 
          tspan = text.text(null).append("tspan").attr("x", 3).attr("y", $y_position_first).attr("transform", "translate(20,0)").attr("dy", ".71em").attr("font-size", "14px")
          while word = words.pop()
            line.push word
            tspan.text line.join(" ")
            if tspan.node().getComputedTextLength() > width
              line.pop()
              tspan.text line.join(" ")
              line = [word]
              tspan = text.append("tspan").attr("x", 3).attr("y", $y_position_second).attr("fill", "#909aa5").attr("font-size", "14px").text(word)
          return

      return

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
      return text

    # Adds the svg canvas
    searchExtentY = (data) ->
      extentYmas = []
      data.dataObj.forEach (d) ->
        elemsExtent = d3.extent(d.data)
        i = 0

        while i < elemsExtent.length
          extentYmas.push elemsExtent[i]
          i++
        return
      maxValue = d3.max(extentYmas).toFixed()
      minValue = d3.min(extentYmas).toFixed()
      
      #addition_even = (maxValue - minValue)/10
      addition_odd = (maxValue - minValue)/5
      #maxStep = Math.pow(10, (maxValue+"").length - 2)
      newMaxVal = +maxValue + addition_odd
      #=Math.ceil(maxValue/maxStep)*maxStep + maxStep;


      #minStep = Math.pow(10, (minValue+"").length - 1)
      newMinVal = +minValue - addition_odd
      # Math.floor(minValue/minStep)*minStep - minStep;
      ###
      while true
        differenceValue = (newMaxVal - newMinVal)/minStep
        console.log 'differenceValue', differenceValue
        console.log differenceValue % 5
        if  differenceValue % 5
          if (newMinVal/minStep % 2 == 0)
            newMaxVal += maxStep
          else
            newMinVal -=minStep
        else 
          break
      if (newMaxVal <= maxValue + maxStep/5)
        newMaxVal += maxStep
        if (newMaxVal/maxStep % 2 != 0)
          newMaxVal += maxStep
      ###

      [
        newMinVal
        newMaxVal
      ]
    margin =
      top: 0
      right: 0
      bottom: 0
      left: 0

    $heightChart = 344
    if $is_homePage
      $heightChart = 318

    width = 780
    if $is_homePage
      width -= 1

    height = $heightChart

    startWidth = 65
    if ($is_homePage)
      startWidth = 0

    $addition = 30
    if $is_homePage
      $addition = 1

    x = d3.scale.linear().range([startWidth, width])
    y = d3.scale.linear().range([height - $addition, 0])

    svg = d3.select(".chart-canvas__bubble").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .attr("class", "svg-chart_dynamics")
    .attr("viewBox", "0 0 #{width} #{height}").attr("perserveAspectRatio", "xMinYMid")
    .append("g").attr("transform", "translate(0,0)")


    # Scale the range of the data
    x.domain [-1, data.date.length]

    limitsY = searchExtentY(data)
    y.domain limitsY

    refactorDate  = (d) ->
      if d != -1 and d != data.date.length
        data.date[d].slice(0, 3)

    xAxis = d3.svg.axis().scale(x).orient("bottom").tickFormat((d) ->
      refactorDate(d)
    ).ticks(10)
    yAxis = d3.svg.axis().scale(y).orient("left").tickFormat((d) ->
      handlePrice(d)
    ).ticks(5)

    # function for the x grid lines
    make_x_axis = ->
      d3.svg.axis().scale(x).orient("bottom").ticks 10

    # function for the y grid lines
    make_y_axis = ->
      d3.svg.axis().scale(y).orient("left").ticks 5


    
    # Draw the y Grid lines
    svg.append("g").attr("class", "svg-grid y-grid").attr("transform", "translate(#{startWidth},0)").call make_y_axis().tickSize(-width, 0, 0).tickFormat("")
    # Draw the x Grid lines
    svg.append("g").attr("class", "svg-grid x-grid").attr("transform", "translate(0," + (height - $addition) + ")").call make_x_axis().tickSize(-height + $addition, 0, 0).tickFormat("")

    # Add the X Axis
    area_x_axis = svg.append("g").attr("class", "x axis").attr("transform", "translate(0," + (height - $addition) + ")").style("font", "14px 'PlumbMedium',sans-serif").call(xAxis)
    area_x_axis.selectAll("text").style("text-anchor", "start").call wrap_bubble_x, 50

    positionAxis_y = 62
    text_y_anchor = 'end'
    unit_y_position = 72
    if $is_homePage
      area_x_axis.selectAll("line").attr("y2", "-5")
      positionAxis_y = 20
      text_y_anchor = 'start'
      unit_y_position = 67

    # Add the Y Axis
    svg.append("g").attr("class", "y axis").attr("transform", "translate(#{positionAxis_y},9)").style("font", "14px 'PlumbMedium',sans-serif").call(yAxis).selectAll("text").style("text-anchor", "#{text_y_anchor}")

    # Add unit for Y axis 
    svg.append("svg:text").attr("transform","translate(#{unit_y_position},13)" ).style("font", "14px 'PlumbRegular',sans-serif").attr("text-anchor", "start").text ("руб/" + data.unit)

    data.dataObj.forEach (d) ->
      circles = svg.append("g").attr("class", "circle").selectAll("circle").data(d.data)
      circles.enter().append("circle").attr("cx", (d, i) ->
        x -1
      ).attr("cy", (d) ->
        y limitsY[0]
      ).attr("r", 8.5).attr "fill", d.color
      .attr "display", (d) ->
        if d == null
          return 'none'
        else
          'block'
      circles.transition().duration(400).attr("cx", (d, i) ->
        x i
      ).attr("cy", (d) ->
        y d
      )
      circles.on("mouseover", (innerValue, i) ->
        $(this).css("cursor", "pointer").attr("fill", (a, i) ->
          d3.rgb(i).brighter(0.4).toString()
        ).attr "r", 10

        widthTooltip = $(".chart-type_bubble .chart-tooltip_wrap").outerWidth()
        coordinateTooltip = d3.event.pageX
        widthWindow = $(window).width()
        tooltip = $(".chart-type_bubble .chart-tooltip_wrap")
        tooltip.find(".chart-tooltip_date").text data.date[i]
        tooltip.find(".chart-tooltip_name").text d.name
        tooltip.find(".chart-tooltip_value").text(innerValue + " руб/" + data.unit)
        if widthWindow <= 1280
          if widthWindow <= 870
            k = widthWindow / 870
          else 
            k = widthWindow / 1280
        else 
          k = 1
        leftTooltip = $(this).offset().left - tooltip.width()/2 + (+this.getAttribute("r")-1)*k
        tooltip.css "left", leftTooltip + "px"
        tooltip.css("top", d3.event.pageY - $(".chart-type_bubble .chart-tooltip_wrap").height()- 30 + "px")
        tooltip.css("display", "block")
        return
      ).on "mouseout", ->
        
        # Hide the tooltip
        d3.select(".chart-type_bubble .chart-tooltip_wrap").style "display", "none"
        $(this).attr("fill", d.color).attr "r", 9
        return

      return

    return
  responsiveBubbleChart = ->
    chart = $(".svg-chart_dynamics")
    aspect = chart.width() / chart.height()
    container = $(".chart-canvas__bubble")
    $(window).on("resize", ->
      targetWidth = container.width()
      chart.attr "width", targetWidth
      chart.attr "height", Math.round(targetWidth / aspect)
      return
    ).trigger "resize"
    return
  window.initBubbleChart = (data) ->
    $homeSection = $('.home-section')
    drawingBubbleChart(data, $homeSection.length)
    responsiveBubbleChart()
    return


  drawingChart = (dataset) ->
    width = 350
    height = 348
    radius = Math.min(width, height) / 2
    labelr = radius - 35
    pie = d3.layout.pie().value((d) ->
      d.end_sum
    ).sort(null)
    arc = d3.svg.arc().innerRadius(radius - 48).outerRadius(radius - 110)
    svg = d3.select(".chart-canvas__donut").append("svg").attr("width", width).attr("height", height).attr("class", "svg-chart_statictics").attr("viewBox", "0 0 350 350").attr("perserveAspectRatio", "xMinYMid").append("g").attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")

    arcs = svg.selectAll("g.slice").data(pie(dataset.dataObj)).enter().append("svg:g").attr("class", "slice")
    pieChart = arcs.append("svg:path").attr("fill", (d, i) ->
      d.data.color.toString()
    ).attr "d", (d, i, j) ->
      d._tmp = d.endAngle
      d.endAngle = d.startAngle
      d.arc = d3.svg.arc().innerRadius(radius - 48).outerRadius(radius - 110)
      d.arc d
    pieChart.transition().delay((d, i, j) ->
      i * 50
    ).duration(60).attrTween "d", (d, x, y) ->
      i = d3.interpolate(d.startAngle, d._tmp)
      (t) ->
        d.endAngle = i(t)
        d.arc d
    pieChart.on("mouseover", (d) ->
      $(this).css("cursor", "pointer").attr "opacity", 0.8

      tooltip = d3.select(".chart-type_donut .chart-tooltip_wrap")
      tooltip.select(".chart-type_donut .chart-tooltip_name").text d.data.name
      widthTooltip = $(".chart-type_donut .chart-tooltip_wrap").innerWidth()
      heightTooltip = $(".chart-type_donut .chart-tooltip_wrap").height()
      coordinateTooltip = d3.event.pageX
      widthWindow = $(window).width()
      tooltip.style("left", d3.event.pageX - $(".chart-type_donut .chart-tooltip_wrap").outerWidth()/2 + "px")
      tooltip.style("top", d3.event.pageY - heightTooltip - 30 + "px").style("display", "block")
      return
    ).on "mouseout", ->
      # Hide the tooltip
      d3.select(".chart-type_donut .chart-tooltip_wrap").style "display", "none"
      $(this).attr "opacity", 1
      return

  
    # pythagorean theorem for hypotenuse
    
    # are we past the center?
    arcs.append("svg:text").transition().delay((d, i, j) ->
      i * 50
    ).duration(60).attr("transform", (d,i) ->
      d.endAngle = d._tmp
      c = arc.centroid(d)
      x = c[0]
      y = c[1]
      h = Math.sqrt(x * x + y * y)
      "translate(" + (x / h * labelr) + "," + (y / h * labelr) + ")"
    ).attr("dy", ".45em").style("font", "14px 'PlumbMedium',sans-serif").attr("text-anchor", (d) ->
      (if (d.endAngle + d.startAngle) / 2 > Math.PI then "end" else "start")
    ).text (d, i) ->
      d.data.end_sum.toFixed(1) + "%"

    return

  # making chart responsive
  responsiveChart = ->
    chart = $(".svg-chart_statictics")
    aspect = chart.width() / chart.height()
    container = $(".chart-canvas__donut")
    $(window).on("resize", ->
      targetWidth = container.width()
      chart.attr "width", targetWidth
      chart.attr "height", Math.round(targetWidth / aspect)
      return
    ).trigger "resize"
    return
  window.initDonutChart = (data) ->
    drawingChart data
    responsiveChart()
    return
