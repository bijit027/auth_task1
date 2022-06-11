<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class='attribute' >
    <table id='customers'>
    
        <tr>
          <th>ID</th>
          <th>Book</th>
          <th>Genre</th>
          <th>Author</th>
          
        </tr>
        
        <?php foreach ($items as $item): ?>
          <tr>  
            <td>
            <?php echo $item->id .'</br>'; ?>
            </td>

            <td>
            <?php echo $item->book_name .'</br>'; ?>
            </td>

            <td>
            <?php echo $item->genre .'</br>'; ?>
            </td>

            <td>
            <?php echo $item->author .'</br>'; ?>
            </td>

        </tr>
                   
        <?php endforeach; ?>

               
        
</table>
</div>
</body>
</html>