(function($){
	var Converter = {
		append: function(data) {
			var tbl = $('#tbl_output');
			var tbody = tbl.find('tbody').empty();
			$.each(data, function(index, value) {
				tbl.append('<tr><td>' + value + '</td></tr>');
			});

			tbl.css('display', '');
		},
		createRequest: function(params) {
			$.ajax({
				url: 'server_side/number_6.php',
				method: 'POST',
				dataType: 'JSON',
				data: JSON.stringify(params)
			}).done(function(result) {
				Converter.append(result);
			});
		},
		init: function() {
			$('form[name="form_console"]').on('submit', function() {
				var values = $(this).find('[name="console"]').val().split(/\n/);
				var index = values.length - 1;
				if (values[index] == 'END') {
					var params = {console: values};
					Converter.createRequest(params);
				}

				return false;
			});
		}
	}

	Converter.init();
})(jQuery);