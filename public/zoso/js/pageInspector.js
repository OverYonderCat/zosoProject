if(typeof Object.create !== 'function') {
    Object.create = function(o) {
        function F() {};
        F.prototype = o;
        return new F();
    };
}

var PageInspector = {
	
	// initialization
	_init: function(options, element) {
		this.options = $.extend({}, this._DEFAULTS, options);
		this.element = element;
		this.$element = $(element);
		this.run();
		return this;
	},
	
	// plugin-defaults
	_DEFAULTS: {
		outputElementId: null
	},
	
	// build DOM and add observer
	run: function() {
		this.$element.append(
			this.createList(1, jQuery.parseJSON($('#pageInspectorData').val()))
		);
	},
	
	createList: function(level, pages) {
		var self = this;
		var ul = $('<ul />', {
			'data-level': level
		});
		$.each(pages, function() {
			var li = $('<li />', {
				'data-pageid': this.id
			})
			.html(self.getListItemHtml(this))
			.click(self.onclick)
			.appendTo(ul);
		});
		return ul;
	},
	
	// generate markup for li-element
	getListItemHtml: function(page) {
		// currently we just output the label
		return page.label;
	},
	
	onclick: function(e) {
		var pageId = e.currentTarget.dataset.pageid;
		$.get('/zosoAdmin/page/get-children/' + pageId, function(response) {
			console.debug(response);
		});
	}
	
};

// implement plugin with backreference to
// itself inside the target-element
(function($, window, document, undefined) {
	$.fn.pageInspector = function(options) {
		if(this.length) {
		    return this.each(function() {
		    	var pageInspector = Object.create(PageInspector);
		    	pageInspector._init(options, this);
		        $.data(this, 'pageInspector', pageInspector);
		    });
		}
	};
})(jQuery, window, document);