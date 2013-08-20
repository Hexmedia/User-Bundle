var GroupsListModel;
(function($) {
	var glm;

	GroupsListModel = function() {
		var self = this, columns;
		columns = [];
		columns[0] = {
			"name": "number",
			"display": "#",
			"type": "number",
			"sortable": false
		};
		columns[1] = {
			"name": "name",
			"display": Translator.get("Name"),
			"type": "text",
			"sortable": true
		};

		self.list().columns(columns);
	};
	ListModel.prototype.getUrl = function(page, sort, pageSize, sortDirection) {
		return Routing.generate("HexMediaGroups", {
			page: page,
			sort: sort,
			pageSize: pageSize,
			sortDirection: sortDirection.toLowerCase()
		});
	};

	GroupsListModel.prototype = new ListModel();
	GroupsListModel.prototype.constructor = GroupsListModel;

	$(document).ready(function() {
		if ($(".data-area-list").get(0)) {
			glm = new GroupsListModel();

			glm.deleteConfirm().action = function(data) {
				$.ajax($(data.caller).attr("href"), {
					dataType: "json",
					type: "DELETE",
					success: function(response) {
						alerts.displaySuccess(Translator.get("Succesfully removed."), 3);
						glm.getData();
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

			ko.applyBindings(glm, $(".data-area-list").get(0));
		}
	});
})(jQuery);
