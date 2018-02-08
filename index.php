<?php require('heap.php'); ?>


<html>
<head>
    <style>
        .container{
            max-width: 60rem;
            margin: 0 auto;

        }

        pre{
            margin: .2rem;
            padding: 1rem 0rem;
            text-align:center;
            font-size: 20px;
        }

        pre:nth-child(odd){
            background: #ddd;
        }
        pre:nth-child(even){
            background: #eee;
        }
    </style>

</head>
<body>
<div class="container">
    <?php
        $ciselka = [1, 2, 3, 4, 5, 6, 7, 8, 9];

        $ciselkaCount = count($ciselka);
        $heap = [];
    ?>
    <?php for($i = 0; $i < $ciselkaCount; $i++): ?>
        <?php $heap = heapInsert($heap, $ciselka[$i]); ?>
    <?php endfor; ?>
    <pre><?php heapToString($heap); ?></pre>



    <?php
    $ciselka = [9, 2, 3, 4, 5, 6, 7, 8, 1];

    $ciselkaCount = count($ciselka);
    $heap = [];
    ?>
    <?php for($i = 0; $i < $ciselkaCount; $i++): ?>
        <?php $heap = heapInsert($heap, $ciselka[$i]); ?>
    <?php endfor; ?>
    <pre><?php heapToString($heap); ?></pre>
</div>
</body>
</html>