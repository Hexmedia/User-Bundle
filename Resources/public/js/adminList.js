var AdminListModel;
(function($) {
	var alm;
	AdminListModel = function() {
		var self = this, columns;
		columns = [];
		columns[0] = {
			"name": "number",
			"display": "#",
			"type": "number",
			"sortable": false
		};
		columns[1] = {
			"name": "email",
			"display": Translator.trans("Email"),
			"type": "email",
			"sortable": true
		};
		columns[2] = {
			"name": "lastLogin",
			"display": Translator.trans("Last Login"),
			"type": "date",
			"sortable": true
		};
		columns[3] = {
			"name": "locked",
			"display": Translator.trans("Locked"),
			"type": "bool",
			"sortable": false
		};
		self.list().columns(columns);
	};
	ListModel.prototype.getUrl = function(page, sort, pageSize, sortDirection) {
		return Routing.generate("HexMediaAdmin", {
			page: page,
			sort: sort,
			pageSize: pageSize,
			sortDirection: sortDirection.toLowerCase()
		});
	};

	AdminListModel.prototype = new ListModel();
	AdminListModel.prototype.constructor = AdminListModel;
	$(document).ready(function() {
		if ($(".data-area-list").get(0)) {
			alm = new AdminListModel();
			alm.deleteConfirm().action = function(data) {
				$.ajax($(data.caller).attr("href"), {
					dataType: "json",
					type: "DELETE",
					success: function(response) {
						alerts.displaySuccess(Translator.trans("Succesfully removed."), 3);
						alm.getData();
					},
					error: function(a, b, errorMessage, d) {
						var json, message;
						json = $.parseJSON(a.responseText);
						message = json[0].message;
						alerts.displayError(message, 3);
					}
				});
				return false;
			};
			ko.applyBindings(alm, $(".data-area-list").get(0));
		}
	});
})(jQuery);
