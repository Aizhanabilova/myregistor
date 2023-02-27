<?php
include "config/base_url.php";
include "config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Редактирование</title>
	<?php include "views/head.php";?>
</head>
<body>
<?php include "views/header.php";?>
<?php    
    $id = $_GET['id'];
    $user = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($user)
?>
	<section class="container page">
		<div class="auth-form">
            <h1>Редактировать данные</h1>
			<form class="form" action="<?=$BASE_URL?>/api/user/update.php?id=<?=$_SESSION['id']?>" method="POST" enctype="multipart/form-data">
                <fieldset class="fieldset">
                    <input class="input" type="text" name="email" placeholder="Введите email" value="<?=$row['email']?>">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="text" name="full_name" placeholder="Полное имя" value="<?=$row['full_name']?>">
                </fieldset>
                <fieldset class="fieldset">
                    <input class="input" type="text" name="nickname" placeholder="Nickname" value="<?=$row['nickname']?>">
                </fieldset>
                <fieldset class="fieldset">
                    <textarea name="about" placeholder="напишите о себе" cols="52" rows="10" value="<?=$row['about']?>"></textarea>
                </fieldset>
                <fieldset class="fieldset">
					<button class="button button-yellow input-file">
						<input type="file" name="image">	
						Выберите картинку
					</button>
				</fieldset>

                <fieldset class="fieldset">
                    <button class="button" type="submit">Изменить данные</button>
                </fieldset>
			</form>
		</div>
	</section>

<?php
if(isset($_GET['error']) && $_GET['error'] = '1'){
?>
    <script>
        alert("Заполните все поля")
    </script>
<?php
}
?>

</body>
</html>