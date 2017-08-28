var message_alert_delete = true;

function delete_row(delete_url , row_id)
{
	if(confirm(message_alert_delete))
	{
		$.ajax({
			url: delete_url,
			dataType: 'json',
			success: function(data)
			{
				if(data.success)
				{
					//success_message(data.success_message);
					toastr.success("Item successfully deleted",'Success!');

					chosen_table = datatables_get_chosen_table($('tr#row-'+row_id).closest('.groceryCrudTable'));

					$('tr#row-'+row_id).addClass('row_selected');
					var anSelected = fnGetSelected( chosen_table );
					chosen_table.fnDeleteRow( anSelected[0] );
				}
				else
				{
					//error_message(data.error_message);
					toastr.error(data.error_message,'Error!');
				}
			}
		});
	}

	return false;
}