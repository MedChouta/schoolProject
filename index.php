<?php

require('controller/frontend.php');


try
{
	if(isset($_GET['page'])){

		if($_GET['page'] == 'accueil'){
			listPosts();
		}

		elseif($_GET['page'] == 'ask'){
			showForm();
		}

		elseif($_GET['page'] == 'addPost'){
			if(!empty($_POST['content']) AND !empty($_POST['title'])){
				post($_COOKIE['userName'], $_POST['content'], $_POST['title'], $_POST['category']);
			}
			else{
				throw new Exception('You need to fill all the inputs');
			}
		}
		elseif($_GET['page'] == 'signUp'){
			if(!empty($_POST['userName']) AND !empty($_POST['email']) AND !empty($_POST['password'])){
				signUp($_POST['userName'],$_POST['email'],$_POST['password']);
			}
			else{
				throw new Exception('You need to fill all the inputs');
			}
		}

		elseif($_GET['page'] == 'signIn'){
			if(!empty($_POST['email']) AND !empty($_POST['password'])){
				signIn($_POST['email'],$_POST['password']);
			}
			else{
				throw new Exception('You need to fill all the inputs');
			}
		}

		elseif($_GET['page'] == 'logout'){
			logout();
		}

		elseif(isset($_GET['id']) AND $_GET['id'] > 0){

			if($_GET['page'] == 'post'){
				showPost($_GET['id']);
			}

			elseif($_GET['page'] == 'addComment'){
				if(!empty($_POST['content'])){
					postComment($_GET['id'], $_COOKIE['userName'], $_POST['content']);
				}
				else{
					throw new Exception('You need to fill all the inputs');
				}
			}
		}

		else{
			throw new Exception('Invalid arguments');
		}
	}
}
catch(Exception $e){
	echo 'Error: '. $e->getMessage();
}