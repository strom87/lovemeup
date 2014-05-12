var help = {
	url: function(path) {
		var url = $('#home').prop('href');
		var last = --url.length;

		if(url[last] == '/')
			url = url.substring(0, last);

		return url+'/'+path;
	},
	getInput: function(data, type) {
		var template = { id: '#@', name: '[name="@"]', idStart: '[id^="@"]', idEnd: '[id$="@"]', nameStart: '[name^="@"]', nameEnd: '[name$="@"]' };

		for(var name in data) {
			data[name] = $(template[type].replace('@', data[name])).val();
		}

		return data;
	},
	isEnterKey: function(e) {
		return (e.keyCode || e.which) == 13;
	}
}