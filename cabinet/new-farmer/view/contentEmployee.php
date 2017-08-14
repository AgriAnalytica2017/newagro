<div class="box-bodyn col-lg-12">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Employee</strong>
            </h1>
        </div>
    </div>
    <div class="col-sm-4" style="padding-right: 0px">
    </div>
</div>
<div class="box-bodyn col-lg-12" style="max-height: 55px">
    <a class="btn btn-primaryn top sh" href="#myModal" data-toggle="modal">Add employee</a>
</div>

<div class="rown">
<table class="table">
	<thead >
		<tr class="tabletop">
			<th>Ім'я та прізвище</th>
			<th>Номер телефону</th>
			<th>Посада</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($date as $employee){ ?>
		<tr>
			<td><? echo $employee['employee_name']." ".$employee['employee_surname'];?></td>
			<td><?=$employee['employee_phone_number'];?></td>
			<td><?=$employee['employee_position'];?></td>
			<td><a href="#editModal" class="btn btn-warning fa fa-pencil editEmploye" data-toggle="modal"
							data-id="<? echo $employee['id_employee']?>"
							data-name="<? echo $employee['employee_name']?>"
							data-surname="<? echo $employee['employee_surname']?>"
							data-number = "<? echo $employee['employee_phone_number']?>"
							data-position = "<? echo $employee['employee_position']?>"

							></a></td>
			<td><a href="/new-farmer/remove_employee/<?echo $employee['id_employee']?>" class="btn btn-danger fa fa-remove"></a></td>
		</tr>
		<?}?>
	</tbody>
</table>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/create_employee" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">Заголовок модального окна</span>
        </div>
     
        <div class="modal-body">
         	<div class="row">
         		<div class="col-lg-3">
					<label>Ім'я</label>
					<input class="form-control inphead" type="text" name="employee_name">
				</div>
				<div class="col-lg-3">
					<label>Прізвище</label>
					<input class="form-control inphead" type="text" name="employee_surname">
				</div>
				<div class="col-lg-3">
					<label>Номер телефону</label>
					<input class="form-control inphead" type="text" name="employee_phone_number">
				</div>
				<div class="col-lg-3">
					<label>Посада</label>
					<input class="form-control inphead" type="text" name="employee_position">
				</div>
			</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="submit" class="btn btn-primaryn">Добавить</button>
        </div>
    </div>
    </form>
  </div>
</div>

<div id="editModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form action="/new-farmer/edit_employee" method="post">
            <div class="modal-content wt">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title">Заголовок модального окна</span>
                </div>
     
      <div class="modal-body">
         	<div class="row">
         		<div class="col-lg-3">
					<label>Ім'я</label>
					<input type="hidden" name="edit_id_employee" id="edit_id_employee">
					<input class="form-control inphead" type="text" name="edit_employee_name" id="edit_employee_name">
				</div>
				<div class="col-lg-3">
					<label>Прізвище</label>
					<input class="form-control inphead" type="text" name="edit_employee_surname" id="edit_employee_surname">
				</div>
				<div class="col-lg-3">
					<label>Номер телефону</label>
					<input class="form-control inphead" type="text" name="edit_employee_phone_number" id="edit_employee_phone_number">
				</div>
				<div class="col-lg-3">
					<label>Посада</label>
					<input class="form-control inphead" type="text" name="edit_employee_position" id="edit_employee_position">
				</div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primaryn editEmployee">Зберегти</button>
      </div>
    </div>
    </form>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.editEmploye').click(edit);
		function edit(){
			var id_employee = $(this).attr('data-id');
			var employee_name = $(this).attr('data-name');
			var employee_surname = $(this).attr('data-surname');
			var employee_phone_number = $(this).attr('data-number');
			var employee_position = $(this).attr('data-position');
			$('#edit_id_employee').val(id_employee);
			$('#edit_employee_name').val(employee_name);
			$('#edit_employee_surname').val(employee_surname);
			$('#edit_employee_phone_number').val(employee_phone_number);
			$('#edit_employee_position').val(employee_position);
		}
	});
</script>