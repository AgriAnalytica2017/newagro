
<table class="table"> 
	<thead class="tabletop">
		<th>Type operation</th>
		<th>Operation</th>
		<th>Date_start</th>
		<th>Date end</th>
		<th>Employe costs</th>
		<th>Material costs</th>
		<th>Fuel Costs</th>
	</thead>
	<tbody>
	<?foreach($date['action'] as $action){?>
		<tr>
		<?foreach($date['operation'] as $operation)if($action['action_action_type_id'] == $operation['action_id']){?>
			<td><?=$operation['name_en']?></td>
		<?}?>
		<?foreach($date['operation'] as $operation)if($action['action_action_id'] == $operation['action_id']){?>
			<td><?=$operation['name_en']?></td>
		<?}?>
			<td><?=$action['action_date_start']?></td>
			<td><?=$action['action_date_end']?></td>
		<?foreach($date['sum_pay'] as $key =>$sum_pay) if($action['action_id']==$key){?>
			<td><?=$sum_pay?></td>
			<?}?>
		<?foreach($date['sum_material'] as $key=>$sum_material)if($action['action_id']==$key){?>
			<td><?=$sum_material?></td>
		<?}?>
		<?foreach($date['sum_equipment'] as $key=>$sum_equipment)if($action['action_id']==$key){?>
			<td><?=$sum_equipment?></td>
		<?}?>
		</tr>
		<?}?>
	</tbody>
</table>