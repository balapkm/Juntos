<table style="margin-top: 10px;" id="example3" class="table table-bordered table-striped">
    <thead>
        <tr>
          <th>Serial No</th>
          <th>Date</th>
          <th>Leather</th>
          <th>Query</th>
          <th>Description</th>
          <th>Article</th>
          <th>Color</th>
          <th>Selection</th>
          <th>Pieces</th>
          <th>Sq.ft</th>
          <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
        [[foreach from=$add_table_data key=k item=v]]
        <tr>
        	<td>[[$v.serial_no]]</td>
        	<td>[[$v.date]]</td>
        	<td>[[$v.leather]]</td>
        	<td>[[$v.query]]</td>
        	<td>[[$v.description_name]]</td>
        	<td>[[$v.article_name]]</td>
        	<td>[[$v.color_name]]</td>
        	<td>[[$v.selection_name]]</td>
        	<td>[[$v.pieces]]</td>
        	<td>[[$v.sqfeet]]</td>
        	<td>[[$v.remarks]]</td>
        </tr>
        [[/foreach]]
    </tbody>
</table>