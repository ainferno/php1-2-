<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <form action="index.php" method="get"> 
    <input type="number" name="x" value="<?php if (isset($_GET['x'])) echo $_GET['x'] ?>">
    <select name="op">
        <option value="0">+</option>
        <option value="2" <?php if (isset($_GET['op']) && $_GET['op'] == 2) echo 'selected' ?>>-</option>
        <option value="1" <?php if (isset($_GET['op']) && $_GET['op'] == 1) echo 'selected' ?>>*</option>
        <option value="3" <?php if (isset($_GET['op']) && $_GET['op'] == 3) echo 'selected' ?>>/</option>
    </select>
    <input type="number" name="y" value="<?php if (isset($_GET['y'])) echo $_GET['y']; ?>">
    <button type="submit">=</button>
    <?php
        if(isset($_GET['op']))
        {
            switch($_GET['op'])
            {
                case 0:
                    echo (int)$_GET['x']+(int)$_GET['y'];
                    break;
                case 1:
                    echo (int)$_GET['x']*(int)$_GET['y'];
                    break;
                case 2:
                    echo (int)$_GET['x']-(int)$_GET['y'];
                    break;
                case 3:
                    if($_GET['y'] == 0)
                    {
                        echo 'Do not divide by zero!';
                        break;
                    }
                    echo (int)$_GET['x']/(int)$_GET['y'];
                    break;
            }
        }
    ?>
    </form>
    
</body>
</html>