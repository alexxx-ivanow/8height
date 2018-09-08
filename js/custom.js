$(function() {
	//добавление нового комментария
	$('#formComment').submit(function(e) {
		e.preventDefault();
		var name = $('#name').val();
		var email = $('#email').val();
		var text = $('#text').val();

		if((name == '') || (email == '') || (text == '')){
			alert('Необходимо заполнить все поля!');
		}else{

    	$.ajax({
    		URL : 'ajax.php',
    		data : {name : name, email : email, text : text},
    		type : 'POST',
    		success : function(res) {
    			//console.log(res);
    			if(res == 200){
    				$('#formComment input, #formComment textarea').val('');
    				$('#myModal').modal('show');
    			}    			

    		}
    	});
      }
	});
	//подтверждение удаления комментария
	$('.delComment').click(function (e) {
		if (!confirm('Вы уверены, что хотите удалить комментарий?')){
            e.preventDefault();
		}
    });
});