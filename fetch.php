<?php 
if(isset($_POST['id'])){
	try{
		$db = new PDO('mysql:host=localhost; dbname=test', 'root', '');
	}catch(PDOException $e){
		$e->getMessage();
	};
	$id = $_POST['id'];

$result = $db->prepare("SELECT * FROM user WHERE id = :id");
$result->execute(['id' => $id]);
$data = $result->fetchAll(PDO::FETCH_OBJ);

}

?>

<?php foreach($data as $row):?>
	<p><?php echo $row->name;?></p>
	<p><?php echo $row->email;?></p>
	<p><?php echo $row->phone;?></p>
<?php endforeach;?>