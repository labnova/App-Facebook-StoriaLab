var bardata = [];


var links; // a global
d3.json("http://www.storialab.it/apertura.php", function(error, data) {
  if (error) return console.warn(error);
  for(key in data){
  	bardata.push(data[key]);
  }
  console.log(bardata); // your links are populated here

var chart= d3.select('#chart').append('svg')
	.attr('width', 600)
	.attr('height', 500)
	.style('background', '#A1C8D3')

chart.selectAll('rect')
	.data(bardata)
	.enter()
		.append('rect')
		.attr('width', function(d) {return d.valore_i; })
		.attr('height', 400)
		.attr('y', function(d) {return d.valore_i; })
		.attr('fill', 'orange')

		});


/*
var colors= d3.scale.linear()
	.domain([0, bardata.length*33, bardata.length*66, bardata.length])
	.range(['orange', 'pink'])


var yScale= d3.scale.linear()
	.domain([0, d3.max(bardata)])
	.range([0, height]);


var xScale = d3.scale.ordinal()
	.domain(d3.range(0,bardata.length)) //[0,1,2,3,4,5] 
	.rangeBands([0, width])

var tooltip= d3.select('body').append('div')
			.style('position', 'absolute')
			.style('padding', '0 10px')
			.style('background', 'white')
			.style('opacity', 0) */



	

	




/*

myChart.transition()
	.attr('height', function(d){
		return yScale(d);
	})
	.attr('y', function(d){
		return height - yScale(d);
	})
	.delay(function(d,i) {
		return i*100;
	})
	.duration(1000)
	.ease('elastic')



var vGuideScale= d3.scale.linear()
	.domain([0, d3.max(bardata)])
	.range([height, 0])

var vAxis= d3.svg.axis()
	.scale(vGuideScale)
	.orient('left')
	.ticks(10)

var vGuide= d3.select('svg').append('g')
	vAxis(vGuide)

	vGuide.attr('transform', 'translate(35,10)')
	vGuide.selectAll('path')
	.style({fill:'none', stroke:'#000'})

	vGuide.selectAll('line')
	.style({ stroke:'#000'})

var hAxis= d3.svg.axis() 
	.scale(xScale)
	.orient('bottom')
	.tickvalues(xScale.domain().filter(function(d,i) {
		return !(i % (bardata.length/5));
	}))

var hGuide= d3.select('svg').append('g')
	hAxis(hGuide)
	hGuide.attr('transform', 'translate(0,'+(height-30)+')')
	hGuide.selectAll('path')
	.style({fill:'none', stroke:'#000'})

	hGuide.selectAll('line')
	.style({ stroke:'#000'}) */







