(function($, window) {

	'use strict'

	$.fn.extend({
		tabSwitch: function(options) {
			options = $.extend({
				//对应的分页class父级元素
				classname: '',
				callback: function() {}
			}, options)
			var $this = $(this);
			$this.click(function(e) {
				var index = $(this).index();
				$(this).addClass('active').siblings().removeClass('active');
				$(options.classname).eq(index).addClass('active').siblings().removeClass('active');
				options.callback(index);
			});
		}
		

	});

	$.extend({
		pagination: function(options) {
			options = $.extend({
				container: '',
				total: 0,
				unit: 0,
				index: 0,
				listcontainer: '',
				prev: '.prev',
				next: '.next',
				onflip: function() {}
			}, options);
			var containerEl = $(options.container),
				paginationBtn = '',
				totalpages = Math.ceil(options.total / options.unit),
				liEl = function(index, active) {
					return "<li class='" + active + "'>" +
						"<a href='javascript:;'>" + index + "</a>" +
						"</li>";
				}
			for (var i = options.index; i < totalpages; i++) {
				if (i == options.index) {
					paginationBtn += liEl(i + 1, 'active');
				} else {
					paginationBtn += liEl(i + 1, '');
				}
			};
			containerEl.find('ul').html('').append(paginationBtn);
			containerEl.find('ul').off('click').on('click', 'li', function() {
				var $this = $(this),
					pagenumber = Number($this.find('a').text());
				options.index = pagenumber - 1;
				// alert(options.index)
				$this.addClass('active').siblings().removeClass('active');
				$(options.listcontainer).html('');
				options.onflip(pagenumber - 1);
			});
			$(options.prev).off('click').click(function() {
				options.index = options.index - 1;
				if (options.index < 0) {
					options.index = 0;
					return;
				} else {
					$(options.listcontainer).html('');
					options.onflip(options.index);
				}
				containerEl.find('ul li').eq(options.index).addClass('active').siblings().removeClass('active');
			});
			$(options.next).off('click').click(function() {
				var totalpages = Math.ceil(options.total / options.unit);
				options.index = options.index + 1;
				if (options.index > totalpages - 1) {
					options.index = totalpages - 1;
					return;
				} else {
					$(options.listcontainer).html('');
					options.onflip(options.index);
				}
				containerEl.find('ul li').eq(options.index).addClass('active').siblings().removeClass('active');
			});
		},
		align: function(options) {
			options = $.extend({
				position: 'both',
				target: '',
				container: '',
				positive: false,
				isImage: false,
				offsetX: 0,
				offsetY: 0,
				ignoreY: 0,
				ignoreX: 0
			}, options);

			var that = $(options.target),
				imgSrc = that.attr('src'),
				reload = false,
				container = $(options.container),
				thisWidth = 0,
				thisHeight = 0,
				containerWidth = 0,
				containerHeight = 0,
				timer,
				imageObj = new Image(),
				offsetX = Number(options.offsetX),
				offsetY = Number(options.offsetY),
				ignoreX = Number(options.ignoreX),
				ignoreY = Number(options.ignoreY),
				ignoredElX = '',
				ignoredElY = '',
				windowWidth = $(window).width(),
				windowHeight = $(window).height();
			//_this.attr('src', imgSrc + '?' + Date.parse(new Date()))
			var tools = {
				calculateIgnore: function() {
					if (typeof options.ignoreY === 'string' || typeof options.ignoreX === 'string') {
						var ignoreArrX = options.ignoreX.split(','),
							ignoreArrY = options.ignoreY.split(',');
						for (var i = 0; i < ignoreArrX.length; i++) {
							ignoreX += $(ignoreArrX[i]).width();
						}
						for (var i = 0; i < ignoreArrY.length; i++) {
							ignoreY += $(ignoreArrY[i]).height();
						}
						ignoredElX = $(ignoreArrX.join(','));
						ignoredElY = $(ignoreArrY.join(','));
						console.log(ignoreY)
					} else {
						ignoreX = options.ignoreX;
						ignoreY = options.ignoreY;
					}
				}
			}
			initAligning();
			$(window).resize(function() {
				initAligning();
			});

			function initAligning() {
				//当居中元素是img标签时，特殊处理！
				if (that.is('img')) {
					//递归判断需要居中的图片是否加载完成，如果没有就重载
					var checkImageLoaded = function() {
						that.each(function(index) {
							var $this = $(options.target);
							var imageSrc = $this.attr('src');
							containerWidth = container.eq(index).width();
							containerHeight = container.eq(index).height();
							if ($this.height() <= 0) {
								imageObj.src = imageSrc;

								// console.log($this.outerWidth())
								checkPosition($this, imageObj.width, imageObj.height)
							} else {
								checkPosition($this)
							}
						});
					}
					checkImageLoaded();
					//缺省情况
				} else {

					//需要遍历每个居中对象，判断其每个container尺寸不同时，需分别处理
					//当设置了container时，以container尺寸大小居中
					if (options.container != '') {
						for (var i = 0; i < that.length; i++) {
							var $this = $(options.target);
							containerHeight = container.eq(i).height();
							containerWidth = container.eq(i).width();
							console.log(containerHeight)

							if ($this.is(':hidden')) {
								return true
							} else {
								checkPosition($this);
							}
						}
						//当没有设置container时，以窗口尺寸大小居中
					} else {
						containerWidth = $(window).width();
						containerHeight = $(window).height();
						that.each(function(index) {
							var $this = $(options.target);
							if ($this.is(':hidden')) {
								return true
							} else {
								checkPosition($this);
							}
						});
					}
				}
			}

			function checkPosition(_this, imageWidth, imageHeight) {
				checkBrowser({
					ie: function() {
						window.clearTimeout(timer);
					},
					other: function() {
						clearTimeout(timer);
					}
				})

				if (arguments[1] != null && arguments[2] != null) {
					var thisWidth = imageWidth,
						thisHeight = imageHeight;

				} else {
					var thisWidth = _this.outerWidth(),
						thisHeight = _this.outerHeight();
				}

				switch (options.position) {
					case 'both':
						// console.log(thisHeight)
						var marginY = (containerHeight - thisHeight) / 2;
						var marginX = (containerWidth - thisWidth) / 2;
						if (options.positive && marginY < 0 || marginX < 0) {
							marginY = marginX = 0;
						}
						if (thisWidth <= containerWidth) {
							if (options.offsetX != 0) {
								_this.css({
									'margin': marginY + offsetY - ignoreY + 'px ' + (containerWidth - thisWidth) / 2 + offsetX - ignoreX + 'px'
								});
							} else {
								_this.css({
									'margin': marginY + offsetY - ignoreY + 'px auto'
								});
							}
						} else {
							var marginX = (containerWidth - thisWidth) / 2;
							_this.css({
								'margin': marginY + offsetY - ignoreY + 'px ' + (marginX + options.offsetX) + 'px'
							});
						}
						break;
					case 'top':
						aligning(function(thisWidth, thisHeight) {
							_this.css({
								'margin': '0 ' + ((containerWidth - thisWidth) / 2 + offsetX - ignoreX) + 'px'
							});
						});
						break;
					case 'right':
						if (thisHeight <= containerHeight) {
							if (options.offsetY != 0) {
								_this.css({
									'margin': marginY + offsetY - ignoreY + 'px 0'
								});
							} else {
								_this.css({
									'margin': marginY + offsetY - ignoreY + 'px 0'
								});
							}
						} else {
							var marginX = (containerWidth - thisWidth) / 2;
							_this.css({
								'margin': (containerHeight - thisHeight) / 2 + offsetY - ignoreY + 'px 0'
							});
						}



						// aligning(function(thisWidth, thisHeight) {
						// 	_this.css({
						// 		'margin': (windowHeight - thisHeight) / 2 + 'px 0 0 ' + (containerWidth - thisWidth) + 'px'
						// 	});
						// });
						break;
					case 'bottom':
						aligning(function(thisWidth, thisHeight) {
							tools.calculateIgnore();
							if (ignoreY <= windowHeight) {
								_this.css({
									'margin': (windowHeight - thisHeight + offsetY - ignoreY) + 'px auto 0'
								});
								console.log(ignoreY)
								console.log(windowHeight)
							};
						});
						break;
					case 'left':
						aligning(function(thisWidth, thisHeight) {
							_this.css({
								'margin': (windowHeight - thisHeight) / 2 + 'px 0 0 0'
							});
						});
						break;
				}
			}

			function aligning(callback) {
				thisWidth = that.outerWidth();
				thisHeight = that.outerHeight();
				return callback(thisWidth, thisHeight);
			}

			function checkBrowser(callback) {
				callback = $.extend({
					ie: function() {
						return;
					},
					other: function() {
						return;
					}
				}, callback)
				if (navigator.appName.indexOf("Explorer") > -1) {
					console.log('IE')
					callback.ie();
				} else {
					// console.log('other')
					callback.other();
				}
			}
			//屏幕方向探测器
			function orientationSensor(callback) {
				var windowWidth = $(window).width(),
					windowHeight = $(window).height(),
					orientation = '';
				callback = $.extend({
					portrait: function() {},
					landscape: function() {},
					orientationchange: function(windowWidth, windowHeight) {}
				}, callback)

				checkoritation();
				$(window).resize(function() {
					checkoritation();
				});

				function checkoritation() {
					callback.orientationchange();
					if (windowWidth < windowHeight) {
						return callback.portrait();
					} else {
						return callback.landscape();
					}
				}
				return (windowWidth < windowHeight) ? orientation = 'portrait' : orientation = 'landscape';
			}
		},
		remResizing: function(options) {
			options = $.extend({
				fontsize: 16,
				baseline: 320,
				threshold: 0,
				basedonnarrow: false,
				basedonwide: false,
				dropoff: false,
				aligncenter: false,
				inward: false
			}, options);
			var htmlEl = $('html'),
				bodyEl = $('body'),
				frontline = $(window).width(),
				windowHeight = $(window).height();

			if (options.baseline <= 0) {
				options.baseline = 1;
			};
			sizeConstraint();
			$(window).on('resize', function() {
				sizeConstraint();
			});

			function sizeConstraint() {
				if (options.basedonnarrow) {
					orientationSensor({
						portrait: function() {
							frontline = $(window).width(),
								windowHeight = $(window).height();
						},
						landscape: function() {
							frontline = $(window).height(),
								windowHeight = $(window).width();
						}
					});
				} else {
					frontline = $(window).width(),
						windowHeight = $(window).height();
				}

				var factor = 0;
				if (options.baseline == 0) {
					//alert('当最小宽度等于0时')
					factor = 1;
				} else if (frontline <= options.baseline) {
					//alert('当最小宽度不等于0且屏幕宽度小于等于最小宽度时')
					if (options.inward) {
						factor = frontline / options.threshold;
					} else {
						factor = frontline / options.baseline;
					}
				} else if (frontline > options.baseline && frontline <= options.threshold || options.threshold == 0) {
					//alert('当屏幕宽度大于最小宽度且小于等于最大宽度，或没有最大宽度时')
					if (options.threshold >= 0) {
						if (options.inward) {
							factor = frontline / options.threshold;
						} else {
							factor = frontline / options.baseline;
						}
					}
				} else if (frontline > options.threshold) {
					//alert('当屏幕宽度大于最大宽度时')
					factor = frontline / options.threshold;

					if (options.aligncenter) {
						bodyEl.css({
							margin: '0 auto',
							width: options.threshold
						});
					} else {
						bodyEl.css('margin', 0);
					}
					// if (options.dropoff) {
					//  alert('dsadas')
					//  htmlEl.css('font-size', 'none');
					//  return;
					// };
				}
				htmlEl.css('font-size', options.fontsize * factor);
				if (options.dropoff && frontline > options.threshold) {
					// alert('dsadas')
					htmlEl.css('font-size', '')
				};
			}
			//屏幕方向探测器
			function orientationSensor(callback) {
				var windowWidth = $(window).width(),
					windowHeight = $(window).height(),
					orientation = '';
				checkoritation();
				$(window).resize(function() {
					checkoritation();
				});

				function checkoritation() {
					if (typeof(callback) != 'undefined') {
						if (windowWidth < windowHeight) {
							return callback.portrait();
						} else {
							return callback.landscape();
						}
					} else {
						callback = {
							portrait: function() {},
							landscape: function() {}
						}
					}
				}
				//console.log((frontline < windowHeight) ? orientation = 'portrait' : orientation = 'landscape')
				return (windowWidth < windowHeight) ? orientation = 'portrait' : orientation = 'landscape';
			}
		},
		popup: function(options) {
			options = $.extend({
				container: '',
				closebtn: '',
				maskopacity: 0,
				noborder: false,
				align: false,
				widthoffset: 17,
				callback: function() {}
			}, options);
			var that = this,
				containerEl = $(options.container),
				thisParent = containerEl.parent(),
				contentWidth = 0,
				popupContainerEl = $('.commonPopupContainer'),
				popupWrapperEl = $('.commonPopupWrapper')

			var tools = {
				getContainerWidth: function() {
					popupContainerEl.show();
					if (options.align) {
						if ($.align) {
							setTimeout(function() {
								$.align({
									target: '.commonPopupWrapper'
								});
							})
						} else {
							alert('不支持align功能')
						}
					}
					if (contentWidth == 0) {
						contentWidth = containerEl.width();
						this.getContainerWidth();
					} else {
						popupContainerEl.hide();
					}
				}
			}

			// popupWrapperEl = $('<div></div>').addClass('commonPopupWrapper').html('').append(containerEl),
			// popupContainerEl = $('<div></div>').addClass('commonPopupContainer')
			// $('.commonPopupContainer').detach();
			// $('body').append(popupContainerEl.append(popupWrapperEl));
			tools.getContainerWidth();
			popupWrapperEl.css({
				width: contentWidth,
				transition: 'all 0.3s'
			});
			if (!options.noborder) {
				popupWrapperEl.css({
					border: '10px solid rgba(153,153,153,0.5)',
					'border-radius': 10,
				})
			};

			popupContainerEl.css({
				display: 'block',
				position: 'fixed',
				top: 0,
				left: 0,
				'z-index': 99999,
				width: $(window).width(),
				height: $(window).height(),
				background: 'rgba(0,0,0,' + options.maskopacity + ')'
			});

			popupContainerEl.resize(function() {
				popupContainerEl.css({
					width: $(window).width(),
					height: $(window).height(),
				});
			});
			containerEl.css({
				display: 'block'
			});
			popupWrapperEl.css({
				display: 'block',
				opacity: 1
			});
			if (popupWrapperEl.height() > $(window).height() - 20) {
				popupWrapperEl.css({
					width: (containerEl.outerWidth() + options.widthoffset),
					height: ($(window).height() - 100),
					overflow: 'auto'
				});
			};

			if (options.closebtn != '') {
				$(options.closebtn).each(function() {
					$(this).on('click', function() {
						// $('body').append($(".commonPopupContainer"));
						$(".commonPopupContainer").hide()
					});
				});
			};
			options.callback();
		},

	});
})(jQuery, window);
