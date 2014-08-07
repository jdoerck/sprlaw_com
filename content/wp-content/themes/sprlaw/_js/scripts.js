$(document).ready(function () {
	$('.main_results_link').load('/results/?ajax=true');
	$('.main_expertise_link').load('/expertise/?ajax=true');
	$('.main_attorneys_link').load('/attorneys/?ajax=true');
});

$(document).ready(function () {

	$('.featured-box, .main_results_link table tr, .main_attorneys_link table tr, .table-expertise tr, .table-spr-sub tr').click(function () {
		window.location.replace($(this).find('a:first').attr('href'));
	});

	$('#home_carousel').delay(300).slideDown('slow');

	$('#home_carousel').carousel({
		interval: 7500
	});

	$('#home_carousel .carousel-indicators li').hover(function() {
		var activeClass = '';
		if ($(this).hasClass('active')) {
			activeClass = 1;
		} else {
			$(this).addClass('active-hover');
		}
	}, function() {
		$(this).removeClass('active-hover');
	});

	$('#main_links').hide().show();
	$('#quick_links, .main_expertise_link').hide();


	$(document).on("change", ".mobile-select", function () {
		if ($(this).val()) {
			document.location = $(this).val();
		}
	});

	$(".main_results_link #result_table").tablesorter( {sortList: [[2,1]]} );

	$('a#more_results, a#less_results').waitUntilExists(function() {
		$('a#more_results, a#less_results').click(function () {
			var url = $(this).attr('href');
			$('.main_results_link').html('');
			$.ajax({
				url: url
			}).done(function( html ) {
				$('.main_results_link').append( html );
				$('.featured_results').html('Results').addClass('results');
			});
			return false;
			$("#result_table").tablesorter( {sortList: [[2,1]]} );
			$('.main_results_link').hide().fadeIn("fast");
		});
	});

//	$('a#less_results').waitUntilExists(function() {
//		$('a#less_results').click(function () {
//			var url = $(this).attr('href');
//			$('.main_results_link').html('');
//			$.ajax({
//				url: url
//			}).done(function( html ) {
//				$('.main_results_link').append( html );
//				$('.show_more_results').hide();
//				$('.featured_results').html('Results').addClass('results');
//			});
//			return false;
//			$("#result_table").tablesorter( {sortList: [[2,1]]} );
//			$('.main_results_link').hide().fadeIn("fast");
//
//		});
//	});

	$("#main_links a.show_subnav").click(function (event) {


//			Show Menu
		if ($(this).hasClass('active')) {
			$("#main_links a").removeClass("active");
			$("#main_links_info").toggle();
//			$('#grey-out').removeClass('active');
//			$('html').removeClass('noscroll');

		} else {
			var url = $(this).attr('href') + '?ajax=true';

//			$('#grey-out').addClass('active');
//			$('html').addClass('noscroll');


			$("#main_links a.active").removeClass("active");
			$(this).addClass("active");
			$("#main_links_info div div div").hide();
			$("div.atty_list, div.view_all").show();
			var info_div = '.' + $(this).attr('id');
			if ($("#main_links_info").css('display') == 'none') {
				$("#main_links_info").toggle();
			}
			$(info_div).show();
//			$(info_div).html('');
//			$.ajax({
//				url: url
//			}).done(function( html ) {
////				$("#main_links_info div div div").html('').hide();
//				$("#main_links_info div div div").hide();
//				$(info_div).show().append( html );
//				$(info_div).show();
//				$('a#more_results').click(function () {
//					var url = $(this).attr('href') + '?ajax=true&all=true';
//					$('.main_results_link').html('');
//					$.ajax({
//						url: url
//					}).done(function( html ) {
//						$('.main_results_link').append( html );
//						$('.show_more_results').hide();
//						$('.featured_results').html('Results').addClass('results');
//						$('.main_results_link').hide().fadeIn("fast");
//						$("#result_table").tablesorter( {sortList: [[2,1]]} );
//
//					});
//
//					return false;
//				});
//				$(info_div).hide().fadeIn("fast");
//				if(info_div == '.main_results_link') {
//					$("#result_table").tablesorter( {sortList: [[2,1]]} );
//				}
//
//			});
			$(info_div).hide().fadeIn("fast");

		}
		return false;
	});

//
//	$(info_div).hide().fadeIn("fast");
//				if(info_div == '.main_results_link') {
//					$("#result_table").tablesorter( {sortList: [[2,1]]} );
//				}

	//    Toggling content on attorney pages

//	var att_content = $('body.single-attorney .main-content');
//	var ps = att_content.find('p').length;
//	if (ps > 1) {
//		att_content.append('<span class="read-more">read more</span><span class="read-less">close</span>');
//	}
//
//	$(".read-more").click(function () {
//		$(this).parent().toggleClass('content-toggle');
//		$(this).parent().find('.read-less').show();
//		$(this).hide();
//	});
//	$(".read-less").click(function () {
//		$(this).parent().toggleClass('content-toggle');
//		$(this).parent().find('.read-more').show();
//		$(this).hide();
//	});

	$('#options').click(function() {
		$('#quick_links li.search').removeClass('active').html('<a href="/search">Search</a>');
		$(this).toggleClass('active');
		$('#main_links a.active').toggleClass('active');
		$("#main_links_info").slideUp();
		$('#quick_links').toggleClass('active');
		if ($('#quick_links').hasClass('active')) {
			$('#quick_links').show();
		} else {
			$('#quick_links').hide();
		}
	});
	$('#main_links a').click(function() {

		$('#quick_links li.search').removeClass('active').html('<a href="/search">Search</a>');
		$('#options').removeClass('active');
		$('#quick_links').removeClass('active').hide();
	});



	$('body.page-id-2175, body.page-id-2575, body.page-id-2139, body.page-id-2137, body.page-id-2141').each(function() {
		$(this).find('#quick_links').find('#options').toggleClass('active');
		$(this).find('#quick_links').show().toggleClass('active');
		$(this).find('#quick_links li.search').removeClass('active').html('<a href="/search">Search</a>');
	});

	$('#result_table.attorney tr.principals td.title:first').html('Principals');
	$('#result_table.attorney tr.associates td.title:first').html('Associates');
	$('#result_table.attorney tr.of_counsel td.title:first').html('Of Counsel');

	$("#contact_honors_link a").click(function () {
		if ($(this).hasClass('active')) {
			$("#contact_honors_link a").removeClass("active");
			$("#contact_honors div").hide();
			$("#contact_honors").toggle()
		} else {
			$("#contact_honors_link a.active").removeClass("active");
			$(this).addClass("active");
			$("#contact_honors div").hide();
			var info_div = '.' + $(this).attr('id');
			if ($("#contact_honors").css('display') == 'none') {
				$("#contact_honors").toggle();
			}
			$(info_div).delay(300).toggle();
		}
		return false;
	});

	if ($('#timeline').length) {
		$($('#timeline')[0].document).ready(function () {
			$('#timeline').delay(600).show();
		});
	}

	$('#quick_links li.search').click(function() {
		if (!$(this).hasClass('active')) {
			$(this).addClass('active').html('<form method="get" id="hdr_searchform" action="/"><input id="s" type="search" name="s" placeholder="Search" class="active"></form>');
		}
		return false;
	});

	$('body.page-id-2575 .contacts .address .overlay, body.page-id-2575 .contacts .email .overlay').click(function() {
		var url = $(this).find('a').attr('href');
		window.location.replace(url);
	});

	$('body.page-id-2214 .read_more .cont').wrap(function() {
		$(this).html('');
		var link = $('<a/>');
		var url = $(this).parent().parent().find('a').attr('href');
		link.attr('href', url);
		link.text('Read More');
		return link;
	});

	var atty_contact_info = $('body.mobile .span4.contact');
	var atty_education_info = $('body.mobile .span4.contact .education')
	$('body.mobile .span6.content').before(atty_contact_info);
	$('body.mobile .span6.content .post-accordion-atty-bio').append(atty_education_info);

//	function gridHeight () {
//		$('.single-attorney .img').height($('.single-attorney .img').siblings('.single-attorney .content').height());
//		$('.single-attorney .contact').height($('.single-attorney .contact').siblings('.single-attorney .content').height());
//	}
//
//	gridHeight();
//
//	$(window).resize(function(){
//		gridHeight();
//	});


//	$( "#attorney-accordion").accordion({
//		animate: false,
//		active: false,
//		heightStyle: "content",
//		collapsible: true,
//		create: function( event, ui ) {
//			$("#attorney-accordion").delay(100).fadeIn("slow").delay(100);
//		},
//		activate: function() {
//		}
//	});

});

/* ===================================================
 * bootstrap-transition.js v2.3.2
 * http://twitter.github.com/bootstrap/javascript.html#transitions
 * ===================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

	"use strict"; // jshint ;_;


	/* CSS TRANSITION SUPPORT (http://www.modernizr.com/)
	 * ======================================================= */

	$(function () {

		$.support.transition = (function () {

			var transitionEnd = (function () {

				var el = document.createElement('bootstrap')
					, transEndEventNames = {
						'WebkitTransition' : 'webkitTransitionEnd'
						,  'MozTransition'    : 'transitionend'
						,  'OTransition'      : 'oTransitionEnd otransitionend'
						,  'transition'       : 'transitionend'
					}
					, name

				for (name in transEndEventNames){
					if (el.style[name] !== undefined) {
						return transEndEventNames[name]
					}
				}

			}())

			return transitionEnd && {
				end: transitionEnd
			}

		})()

	})

}(window.jQuery);


/* ==========================================================
 * bootstrap-carousel.js v2.3.2
 * http://twitter.github.com/bootstrap/javascript.html#carousel
 * ==========================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

	"use strict"; // jshint ;_;


	/* CAROUSEL CLASS DEFINITION
	 * ========================= */

	var Carousel = function (element, options) {
		this.$element = $(element)
		this.$indicators = this.$element.find('.carousel-indicators')
		this.options = options
		this.options.pause == 'hover' && this.$element
			.on('mouseenter', $.proxy(this.pause, this))
			.on('mouseleave', $.proxy(this.cycle, this))
	}

	Carousel.prototype = {

		cycle: function (e) {
			if (!e) this.paused = false
			if (this.interval) clearInterval(this.interval);
			this.options.interval
				&& !this.paused
			&& (this.interval = setInterval($.proxy(this.next, this), this.options.interval))
			return this
		}

		, getActiveIndex: function () {
			this.$active = this.$element.find('.item.active')
			this.$items = this.$active.parent().children()
			return this.$items.index(this.$active)
		}

		, to: function (pos) {
			var activeIndex = this.getActiveIndex()
				, that = this

			if (pos > (this.$items.length - 1) || pos < 0) return

			if (this.sliding) {
				return this.$element.one('slid', function () {
					that.to(pos)
				})
			}

			if (activeIndex == pos) {
				return this.pause().cycle()
			}

			return this.slide(pos > activeIndex ? 'next' : 'prev', $(this.$items[pos]))
		}

		, pause: function (e) {
			if (!e) this.paused = true
			if (this.$element.find('.next, .prev').length && $.support.transition.end) {
				this.$element.trigger($.support.transition.end)
				this.cycle(true)
			}
			clearInterval(this.interval)
			this.interval = null
			return this
		}

		, next: function () {
			if (this.sliding) return
			return this.slide('next')
		}

		, prev: function () {
			if (this.sliding) return
			return this.slide('prev')
		}

		, slide: function (type, next) {
			var $active = this.$element.find('.item.active')
				, $next = next || $active[type]()
				, isCycling = this.interval
				, direction = type == 'next' ? 'left' : 'right'
				, fallback  = type == 'next' ? 'first' : 'last'
				, that = this
				, e

			this.sliding = true

			isCycling && this.pause()

			$next = $next.length ? $next : this.$element.find('.item')[fallback]()

			e = $.Event('slide', {
				relatedTarget: $next[0]
				, direction: direction
			})

			if ($next.hasClass('active')) return

			if (this.$indicators.length) {
				this.$indicators.find('.active').removeClass('active')
				this.$element.one('slid', function () {
					var $nextIndicator = $(that.$indicators.children()[that.getActiveIndex()])
					$nextIndicator && $nextIndicator.addClass('active')
				})
			}

			if ($.support.transition && this.$element.hasClass('slide')) {
				this.$element.trigger(e)
				if (e.isDefaultPrevented()) return
				$next.addClass(type)
				$next[0].offsetWidth // force reflow
				$active.addClass(direction)
				$next.addClass(direction)
				this.$element.one($.support.transition.end, function () {
					$next.removeClass([type, direction].join(' ')).addClass('active')
					$active.removeClass(['active', direction].join(' '))
					that.sliding = false
					setTimeout(function () { that.$element.trigger('slid') }, 0)
				})
			} else {
				this.$element.trigger(e)
				if (e.isDefaultPrevented()) return
				$active.removeClass('active')
				$next.addClass('active')
				this.sliding = false
				this.$element.trigger('slid')
			}

			isCycling && this.cycle()

			return this
		}

	}


	/* CAROUSEL PLUGIN DEFINITION
	 * ========================== */

	var old = $.fn.carousel

	$.fn.carousel = function (option) {
		return this.each(function () {
			var $this = $(this)
				, data = $this.data('carousel')
				, options = $.extend({}, $.fn.carousel.defaults, typeof option == 'object' && option)
				, action = typeof option == 'string' ? option : options.slide
			if (!data) $this.data('carousel', (data = new Carousel(this, options)))
			if (typeof option == 'number') data.to(option)
			else if (action) data[action]()
			else if (options.interval) data.pause().cycle()
		})
	}

	$.fn.carousel.defaults = {
		interval: 5000
		, pause: 'hover'
	}

	$.fn.carousel.Constructor = Carousel


	/* CAROUSEL NO CONFLICT
	 * ==================== */

	$.fn.carousel.noConflict = function () {
		$.fn.carousel = old
		return this
	}

	/* CAROUSEL DATA-API
	 * ================= */

	$(document).on('click.carousel.data-api', '[data-slide], [data-slide-to]', function (e) {
		var $this = $(this), href
			, $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) //strip for ie7
			, options = $.extend({}, $target.data(), $this.data())
			, slideIndex

		$target.carousel(options)

		if (slideIndex = $this.attr('data-slide-to')) {
			$target.data('carousel').pause().to(slideIndex).cycle()
		}

		e.preventDefault()
	})

}(window.jQuery);


/*
 * TableSorter 2.0 - Client-side table sorting with ease!
 * Version 2.0.5b
 * @requires jQuery v1.2.3
 */
(function($){$.extend({tablesorter:new
	function(){var parsers=[],widgets=[];this.defaults={cssHeader:"header",cssAsc:"headerSortUp",cssDesc:"headerSortDown",cssChildRow:"expand-child",sortInitialOrder:"asc",sortMultiSortKey:"shiftKey",sortForce:null,sortAppend:null,sortLocaleCompare:true,textExtraction:"simple",parsers:{},widgets:[],widgetZebra:{css:["even","odd"]},headers:{},widthFixed:false,cancelSelection:true,sortList:[],headerList:[],dateFormat:"us",decimal:'/\.|\,/g',onRenderHeader:null,selectorHeaders:'thead th',debug:false};function benchmark(s,d){log(s+","+(new Date().getTime()-d.getTime())+"ms");}this.benchmark=benchmark;function log(s){if(typeof console!="undefined"&&typeof console.debug!="undefined"){console.log(s);}else{alert(s);}}function buildParserCache(table,$headers){if(table.config.debug){var parsersDebug="";}if(table.tBodies.length==0)return;var rows=table.tBodies[0].rows;if(rows[0]){var list=[],cells=rows[0].cells,l=cells.length;for(var i=0;i<l;i++){var p=false;if($.metadata&&($($headers[i]).metadata()&&$($headers[i]).metadata().sorter)){p=getParserById($($headers[i]).metadata().sorter);}else if((table.config.headers[i]&&table.config.headers[i].sorter)){p=getParserById(table.config.headers[i].sorter);}if(!p){p=detectParserForColumn(table,rows,-1,i);}if(table.config.debug){parsersDebug+="column:"+i+" parser:"+p.id+"\n";}list.push(p);}}if(table.config.debug){log(parsersDebug);}return list;};function detectParserForColumn(table,rows,rowIndex,cellIndex){var l=parsers.length,node=false,nodeValue=false,keepLooking=true;while(nodeValue==''&&keepLooking){rowIndex++;if(rows[rowIndex]){node=getNodeFromRowAndCellIndex(rows,rowIndex,cellIndex);nodeValue=trimAndGetNodeText(table.config,node);if(table.config.debug){log('Checking if value was empty on row:'+rowIndex);}}else{keepLooking=false;}}for(var i=1;i<l;i++){if(parsers[i].is(nodeValue,table,node)){return parsers[i];}}return parsers[0];}function getNodeFromRowAndCellIndex(rows,rowIndex,cellIndex){return rows[rowIndex].cells[cellIndex];}function trimAndGetNodeText(config,node){return $.trim(getElementText(config,node));}function getParserById(name){var l=parsers.length;for(var i=0;i<l;i++){if(parsers[i].id.toLowerCase()==name.toLowerCase()){return parsers[i];}}return false;}function buildCache(table){if(table.config.debug){var cacheTime=new Date();}var totalRows=(table.tBodies[0]&&table.tBodies[0].rows.length)||0,totalCells=(table.tBodies[0].rows[0]&&table.tBodies[0].rows[0].cells.length)||0,parsers=table.config.parsers,cache={row:[],normalized:[]};for(var i=0;i<totalRows;++i){var c=$(table.tBodies[0].rows[i]),cols=[];if(c.hasClass(table.config.cssChildRow)){cache.row[cache.row.length-1]=cache.row[cache.row.length-1].add(c);continue;}cache.row.push(c);for(var j=0;j<totalCells;++j){cols.push(parsers[j].format(getElementText(table.config,c[0].cells[j]),table,c[0].cells[j]));}cols.push(cache.normalized.length);cache.normalized.push(cols);cols=null;};if(table.config.debug){benchmark("Building cache for "+totalRows+" rows:",cacheTime);}return cache;};function getElementText(config,node){var text="";if(!node)return"";if(!config.supportsTextContent)config.supportsTextContent=node.textContent||false;if(config.textExtraction=="simple"){if(config.supportsTextContent){text=node.textContent;}else{if(node.childNodes[0]&&node.childNodes[0].hasChildNodes()){text=node.childNodes[0].innerHTML;}else{text=node.innerHTML;}}}else{if(typeof(config.textExtraction)=="function"){text=config.textExtraction(node);}else{text=$(node).text();}}return text;}function appendToTable(table,cache){if(table.config.debug){var appendTime=new Date()}var c=cache,r=c.row,n=c.normalized,totalRows=n.length,checkCell=(n[0].length-1),tableBody=$(table.tBodies[0]),rows=[];for(var i=0;i<totalRows;i++){var pos=n[i][checkCell];rows.push(r[pos]);if(!table.config.appender){var l=r[pos].length;for(var j=0;j<l;j++){tableBody[0].appendChild(r[pos][j]);}}}if(table.config.appender){table.config.appender(table,rows);}rows=null;if(table.config.debug){benchmark("Rebuilt table:",appendTime);}applyWidget(table);setTimeout(function(){$(table).trigger("sortEnd");},0);};function buildHeaders(table){if(table.config.debug){var time=new Date();}var meta=($.metadata)?true:false;var header_index=computeTableHeaderCellIndexes(table);$tableHeaders=$(table.config.selectorHeaders,table).each(function(index){this.column=header_index[this.parentNode.rowIndex+"-"+this.cellIndex];this.order=formatSortingOrder(table.config.sortInitialOrder);this.count=this.order;if(checkHeaderMetadata(this)||checkHeaderOptions(table,index))this.sortDisabled=true;if(checkHeaderOptionsSortingLocked(table,index))this.order=this.lockedOrder=checkHeaderOptionsSortingLocked(table,index);if(!this.sortDisabled){var $th=$(this).addClass(table.config.cssHeader);if(table.config.onRenderHeader)table.config.onRenderHeader.apply($th);}table.config.headerList[index]=this;});if(table.config.debug){benchmark("Built headers:",time);log($tableHeaders);}return $tableHeaders;};function computeTableHeaderCellIndexes(t){var matrix=[];var lookup={};var thead=t.getElementsByTagName('THEAD')[0];var trs=thead.getElementsByTagName('TR');for(var i=0;i<trs.length;i++){var cells=trs[i].cells;for(var j=0;j<cells.length;j++){var c=cells[j];var rowIndex=c.parentNode.rowIndex;var cellId=rowIndex+"-"+c.cellIndex;var rowSpan=c.rowSpan||1;var colSpan=c.colSpan||1
		var firstAvailCol;if(typeof(matrix[rowIndex])=="undefined"){matrix[rowIndex]=[];}for(var k=0;k<matrix[rowIndex].length+1;k++){if(typeof(matrix[rowIndex][k])=="undefined"){firstAvailCol=k;break;}}lookup[cellId]=firstAvailCol;for(var k=rowIndex;k<rowIndex+rowSpan;k++){if(typeof(matrix[k])=="undefined"){matrix[k]=[];}var matrixrow=matrix[k];for(var l=firstAvailCol;l<firstAvailCol+colSpan;l++){matrixrow[l]="x";}}}}return lookup;}function checkCellColSpan(table,rows,row){var arr=[],r=table.tHead.rows,c=r[row].cells;for(var i=0;i<c.length;i++){var cell=c[i];if(cell.colSpan>1){arr=arr.concat(checkCellColSpan(table,headerArr,row++));}else{if(table.tHead.length==1||(cell.rowSpan>1||!r[row+1])){arr.push(cell);}}}return arr;};function checkHeaderMetadata(cell){if(($.metadata)&&($(cell).metadata().sorter===false)){return true;};return false;}function checkHeaderOptions(table,i){if((table.config.headers[i])&&(table.config.headers[i].sorter===false)){return true;};return false;}function checkHeaderOptionsSortingLocked(table,i){if((table.config.headers[i])&&(table.config.headers[i].lockedOrder))return table.config.headers[i].lockedOrder;return false;}function applyWidget(table){var c=table.config.widgets;var l=c.length;for(var i=0;i<l;i++){getWidgetById(c[i]).format(table);}}function getWidgetById(name){var l=widgets.length;for(var i=0;i<l;i++){if(widgets[i].id.toLowerCase()==name.toLowerCase()){return widgets[i];}}};function formatSortingOrder(v){if(typeof(v)!="Number"){return(v.toLowerCase()=="desc")?1:0;}else{return(v==1)?1:0;}}function isValueInArray(v,a){var l=a.length;for(var i=0;i<l;i++){if(a[i][0]==v){return true;}}return false;}function setHeadersCss(table,$headers,list,css){$headers.removeClass(css[0]).removeClass(css[1]);var h=[];$headers.each(function(offset){if(!this.sortDisabled){h[this.column]=$(this);}});var l=list.length;for(var i=0;i<l;i++){h[list[i][0]].addClass(css[list[i][1]]);}}function fixColumnWidth(table,$headers){var c=table.config;if(c.widthFixed){var colgroup=$('<colgroup>');$("tr:first td",table.tBodies[0]).each(function(){colgroup.append($('<col>').css('width',$(this).width()));});$(table).prepend(colgroup);};}function updateHeaderSortCount(table,sortList){var c=table.config,l=sortList.length;for(var i=0;i<l;i++){var s=sortList[i],o=c.headerList[s[0]];o.count=s[1];o.count++;}}function multisort(table,sortList,cache){if(table.config.debug){var sortTime=new Date();}var dynamicExp="var sortWrapper = function(a,b) {",l=sortList.length;for(var i=0;i<l;i++){var c=sortList[i][0];var order=sortList[i][1];var s=(table.config.parsers[c].type=="text")?((order==0)?makeSortFunction("text","asc",c):makeSortFunction("text","desc",c)):((order==0)?makeSortFunction("numeric","asc",c):makeSortFunction("numeric","desc",c));var e="e"+i;dynamicExp+="var "+e+" = "+s;dynamicExp+="if("+e+") { return "+e+"; } ";dynamicExp+="else { ";}var orgOrderCol=cache.normalized[0].length-1;dynamicExp+="return a["+orgOrderCol+"]-b["+orgOrderCol+"];";for(var i=0;i<l;i++){dynamicExp+="}; ";}dynamicExp+="return 0; ";dynamicExp+="}; ";if(table.config.debug){benchmark("Evaling expression:"+dynamicExp,new Date());}eval(dynamicExp);cache.normalized.sort(sortWrapper);if(table.config.debug){benchmark("Sorting on "+sortList.toString()+" and dir "+order+" time:",sortTime);}return cache;};function makeSortFunction(type,direction,index){var a="a["+index+"]",b="b["+index+"]";if(type=='text'&&direction=='asc'){return"("+a+" == "+b+" ? 0 : ("+a+" === null ? Number.POSITIVE_INFINITY : ("+b+" === null ? Number.NEGATIVE_INFINITY : ("+a+" < "+b+") ? -1 : 1 )));";}else if(type=='text'&&direction=='desc'){return"("+a+" == "+b+" ? 0 : ("+a+" === null ? Number.POSITIVE_INFINITY : ("+b+" === null ? Number.NEGATIVE_INFINITY : ("+b+" < "+a+") ? -1 : 1 )));";}else if(type=='numeric'&&direction=='asc'){return"("+a+" === null && "+b+" === null) ? 0 :("+a+" === null ? Number.POSITIVE_INFINITY : ("+b+" === null ? Number.NEGATIVE_INFINITY : "+a+" - "+b+"));";}else if(type=='numeric'&&direction=='desc'){return"("+a+" === null && "+b+" === null) ? 0 :("+a+" === null ? Number.POSITIVE_INFINITY : ("+b+" === null ? Number.NEGATIVE_INFINITY : "+b+" - "+a+"));";}};function makeSortText(i){return"((a["+i+"] < b["+i+"]) ? -1 : ((a["+i+"] > b["+i+"]) ? 1 : 0));";};function makeSortTextDesc(i){return"((b["+i+"] < a["+i+"]) ? -1 : ((b["+i+"] > a["+i+"]) ? 1 : 0));";};function makeSortNumeric(i){return"a["+i+"]-b["+i+"];";};function makeSortNumericDesc(i){return"b["+i+"]-a["+i+"];";};function sortText(a,b){if(table.config.sortLocaleCompare)return a.localeCompare(b);return((a<b)?-1:((a>b)?1:0));};function sortTextDesc(a,b){if(table.config.sortLocaleCompare)return b.localeCompare(a);return((b<a)?-1:((b>a)?1:0));};function sortNumeric(a,b){return a-b;};function sortNumericDesc(a,b){return b-a;};function getCachedSortType(parsers,i){return parsers[i].type;};this.construct=function(settings){return this.each(function(){if(!this.tHead||!this.tBodies)return;var $this,$document,$headers,cache,config,shiftDown=0,sortOrder;this.config={};config=$.extend(this.config,$.tablesorter.defaults,settings);$this=$(this);$.data(this,"tablesorter",config);$headers=buildHeaders(this);this.config.parsers=buildParserCache(this,$headers);cache=buildCache(this);var sortCSS=[config.cssDesc,config.cssAsc];fixColumnWidth(this);$headers.click(function(e){var totalRows=($this[0].tBodies[0]&&$this[0].tBodies[0].rows.length)||0;if(!this.sortDisabled&&totalRows>0){$this.trigger("sortStart");var $cell=$(this);var i=this.column;this.order=this.count++%2;if(this.lockedOrder)this.order=this.lockedOrder;if(!e[config.sortMultiSortKey]){config.sortList=[];if(config.sortForce!=null){var a=config.sortForce;for(var j=0;j<a.length;j++){if(a[j][0]!=i){config.sortList.push(a[j]);}}}config.sortList.push([i,this.order]);}else{if(isValueInArray(i,config.sortList)){for(var j=0;j<config.sortList.length;j++){var s=config.sortList[j],o=config.headerList[s[0]];if(s[0]==i){o.count=s[1];o.count++;s[1]=o.count%2;}}}else{config.sortList.push([i,this.order]);}};setTimeout(function(){setHeadersCss($this[0],$headers,config.sortList,sortCSS);appendToTable($this[0],multisort($this[0],config.sortList,cache));},1);return false;}}).mousedown(function(){if(config.cancelSelection){this.onselectstart=function(){return false};return false;}});$this.bind("update",function(){var me=this;setTimeout(function(){me.config.parsers=buildParserCache(me,$headers);cache=buildCache(me);},1);}).bind("updateCell",function(e,cell){var config=this.config;var pos=[(cell.parentNode.rowIndex-1),cell.cellIndex];cache.normalized[pos[0]][pos[1]]=config.parsers[pos[1]].format(getElementText(config,cell),cell);}).bind("sorton",function(e,list){$(this).trigger("sortStart");config.sortList=list;var sortList=config.sortList;updateHeaderSortCount(this,sortList);setHeadersCss(this,$headers,sortList,sortCSS);appendToTable(this,multisort(this,sortList,cache));}).bind("appendCache",function(){appendToTable(this,cache);}).bind("applyWidgetId",function(e,id){getWidgetById(id).format(this);}).bind("applyWidgets",function(){applyWidget(this);});if($.metadata&&($(this).metadata()&&$(this).metadata().sortlist)){config.sortList=$(this).metadata().sortlist;}if(config.sortList.length>0){$this.trigger("sorton",[config.sortList]);}applyWidget(this);});};this.addParser=function(parser){var l=parsers.length,a=true;for(var i=0;i<l;i++){if(parsers[i].id.toLowerCase()==parser.id.toLowerCase()){a=false;}}if(a){parsers.push(parser);};};this.addWidget=function(widget){widgets.push(widget);};this.formatFloat=function(s){var i=parseFloat(s);return(isNaN(i))?0:i;};this.formatInt=function(s){var i=parseInt(s);return(isNaN(i))?0:i;};this.isDigit=function(s,config){return/^[-+]?\d*$/.test($.trim(s.replace(/[,.']/g,'')));};this.clearTableBody=function(table){if($.browser.msie){function empty(){while(this.firstChild)this.removeChild(this.firstChild);}empty.apply(table.tBodies[0]);}else{table.tBodies[0].innerHTML="";}};}});$.fn.extend({tablesorter:$.tablesorter.construct});var ts=$.tablesorter;ts.addParser({id:"text",is:function(s){return true;},format:function(s){return $.trim(s.toLocaleLowerCase());},type:"text"});ts.addParser({id:"digit",is:function(s,table){var c=table.config;return $.tablesorter.isDigit(s,c);},format:function(s){return $.tablesorter.formatFloat(s);},type:"numeric"});ts.addParser({id:"currency",is:function(s){return/^[£$€?.]/.test(s);},format:function(s){return $.tablesorter.formatFloat(s.replace(new RegExp(/[£$€]/g),""));},type:"numeric"});ts.addParser({id:"ipAddress",is:function(s){return/^\d{2,3}[\.]\d{2,3}[\.]\d{2,3}[\.]\d{2,3}$/.test(s);},format:function(s){var a=s.split("."),r="",l=a.length;for(var i=0;i<l;i++){var item=a[i];if(item.length==2){r+="0"+item;}else{r+=item;}}return $.tablesorter.formatFloat(r);},type:"numeric"});ts.addParser({id:"url",is:function(s){return/^(https?|ftp|file):\/\/$/.test(s);},format:function(s){return jQuery.trim(s.replace(new RegExp(/(https?|ftp|file):\/\//),''));},type:"text"});ts.addParser({id:"isoDate",is:function(s){return/^\d{4}[\/-]\d{1,2}[\/-]\d{1,2}$/.test(s);},format:function(s){return $.tablesorter.formatFloat((s!="")?new Date(s.replace(new RegExp(/-/g),"/")).getTime():"0");},type:"numeric"});ts.addParser({id:"percent",is:function(s){return/\%$/.test($.trim(s));},format:function(s){return $.tablesorter.formatFloat(s.replace(new RegExp(/%/g),""));},type:"numeric"});ts.addParser({id:"usLongDate",is:function(s){return s.match(new RegExp(/^[A-Za-z]{3,10}\.? [0-9]{1,2}, ([0-9]{4}|'?[0-9]{2}) (([0-2]?[0-9]:[0-5][0-9])|([0-1]?[0-9]:[0-5][0-9]\s(AM|PM)))$/));},format:function(s){return $.tablesorter.formatFloat(new Date(s).getTime());},type:"numeric"});ts.addParser({id:"shortDate",is:function(s){return/\d{1,2}[\/\-]\d{1,2}[\/\-]\d{2,4}/.test(s);},format:function(s,table){var c=table.config;s=s.replace(/\-/g,"/");if(c.dateFormat=="us"){s=s.replace(/(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,"$3/$1/$2");}else if(c.dateFormat=="uk"){s=s.replace(/(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/,"$3/$2/$1");}else if(c.dateFormat=="dd/mm/yy"||c.dateFormat=="dd-mm-yy"){s=s.replace(/(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{2})/,"$1/$2/$3");}return $.tablesorter.formatFloat(new Date(s).getTime());},type:"numeric"});ts.addParser({id:"time",is:function(s){return/^(([0-2]?[0-9]:[0-5][0-9])|([0-1]?[0-9]:[0-5][0-9]\s(am|pm)))$/.test(s);},format:function(s){return $.tablesorter.formatFloat(new Date("2000/01/01 "+s).getTime());},type:"numeric"});ts.addParser({id:"metadata",is:function(s){return false;},format:function(s,table,cell){var c=table.config,p=(!c.parserMetadataName)?'sortValue':c.parserMetadataName;return $(cell).metadata()[p];},type:"numeric"});ts.addWidget({id:"zebra",format:function(table){if(table.config.debug){var time=new Date();}var $tr,row=-1,odd;$("tr:visible",table.tBodies[0]).each(function(i){$tr=$(this);if(!$tr.hasClass(table.config.cssChildRow))row++;odd=(row%2==0);$tr.removeClass(table.config.widgetZebra.css[odd?0:1]).addClass(table.config.widgetZebra.css[odd?1:0])});if(table.config.debug){$.tablesorter.benchmark("Applying Zebra widget",time);}}});})(jQuery);

(function ($) {

	/**
	 * @function
	 * @property {object} jQuery plugin which runs handler function once specified element is inserted into the DOM
	 * @param {function} handler A function to execute at the time when the element is inserted
	 * @param {bool} shouldRunHandlerOnce Optional: if true, handler is unbound after its first invocation
	 * @example $(selector).waitUntilExists(function);
	 */

	$.fn.waitUntilExists    = function (handler, shouldRunHandlerOnce, isChild) {
		var found       = 'found';
		var $this       = $(this.selector);
		var $elements   = $this.not(function () { return $(this).data(found); }).each(handler).data(found, true);

		if (!isChild)
		{
			(window.waitUntilExists_Intervals = window.waitUntilExists_Intervals || {})[this.selector] =
				window.setInterval(function () { $this.waitUntilExists(handler, shouldRunHandlerOnce, true); }, 500)
			;
		}
		else if (shouldRunHandlerOnce && $elements.length)
		{
			window.clearInterval(window.waitUntilExists_Intervals[this.selector]);
		}

		return $this;
	}

}(jQuery));