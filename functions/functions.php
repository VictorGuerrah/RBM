<?php

function getClientes() {
    global $conn;

    $sql = "SELECT * FROM cliente";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $return[] = $row;
        }
        return $return;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getProdutos() {
    global $conn;

    $sql = "SELECT * FROM produto";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $return[] = $row;
        }
        return $return;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getVendas() {
    global $conn;

    $sql = "SELECT v.CD_VENDA, c.NM_CLIENTE, DATE_FORMAT(v.DT_VENDA, '%d/%m/%Y') AS DT_VENDA FROM venda v
            JOIN cliente c ON c.CD_CLIENTE = v.CD_CLIENTE";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $return[] = $row;
        }
        return $return;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getCliente($id) {
    global $conn;

    $sql = "SELECT * FROM cliente WHERE CD_CLIENTE = $id";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getProduto($id) {
    global $conn;

    $sql = "SELECT * FROM produto WHERE CD_PRODUTO = $id";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getVenda($id) {
    global $conn;

    $sql = "SELECT 
                NM_PRODUTO, QTD_PRODUTO, VL_PRODUTO 
            FROM 
                assoc_produto_venda a
            JOIN 
                produto p
                ON  a.CD_PRODUTO = p.CD_PRODUTO
            
            WHERE a.CD_VENDA = $id";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $return[] = $row;
        }
        return $return;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function insertCliente($dados) {
    global $conn;

    $dados['DC_COMPLEMENTO'] = empty($dados['DC_COMPLEMENTO']) ? NULL : $dados['DC_COMPLEMENTO'];

    $sql = "INSERT INTO cliente (NM_CLIENTE, NR_TELEFONE, DC_ENDERECO, DC_BAIRRO, DC_CIDADE, NR_CASA, DC_COMPLEMENTO, DC_EMAIL) VALUES ('{$dados['NM_CLIENTE']}', {$dados['NR_TELEFONE']}, '{$dados['DC_ENDERECO']}', '{$dados['DC_BAIRRO']}', '{$dados['DC_CIDADE']}', '{$dados['NR_CASA']}', '{$dados['DC_COMPLEMENTO']}', '{$dados['DC_EMAIL']}')";

    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return 'Success';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function insertProduto($dados) {
    global $conn;

    $sql = "INSERT INTO produto (NM_PRODUTO, VL_PRODUTO) VALUES ('{$dados['NM_PRODUTO']}', {$dados['VL_PRODUTO']})";

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return 'Success';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function insertVenda($dados) {
    global $conn;

    $sql = "INSERT INTO venda (CD_CLIENTE) VALUES ({$dados['CD_CLIENTE']})";

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $id = $conn->lastInsertId();
        insertVendaAssoc($id, $dados['produtos'], $dados['quantidade']);
        return 'Success';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function insertVendaAssoc($id, $produtos, $quantidades) {
    global $conn;

    foreach ($produtos as $key => $value) {
        $sql = "INSERT INTO assoc_produto_venda (CD_VENDA, CD_PRODUTO, QTD_PRODUTO) VALUES ($id, $value, {$quantidades[$key]})";
        
        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

function deleteCliente($id) {
    global $conn;

    $sql = "DELETE FROM cliente WHERE CD_CLIENTE = $id";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return 'Success';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function deleteProduto($id) {
    global $conn;

    $sql = "DELETE FROM produto WHERE CD_PRODUTO = $id";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return 'Success';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function deleteVenda($id) {
    global $conn;

    $sql = "DELETE FROM venda WHERE CD_VENDA = $id";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        deleteVendaAssoc($id);
        return 'Success';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function deleteVendaAssoc($id) {
    global $conn;

    $sql = "DELETE FROM assoc_produto_venda WHERE CD_VENDA = $id";
    
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return 'Success';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function updateCliente($dados) {
    global $conn;

    $dados['DC_COMPLEMENTO'] = empty($dados['DC_COMPLEMENTO']) ? NULL : $dados['DC_COMPLEMENTO'];

    $sql = "UPDATE cliente SET  
                NM_CLIENTE = '{$dados['NM_CLIENTE']}', 
                NR_TELEFONE = {$dados['NR_TELEFONE']},
                DC_ENDERECO = '{$dados['DC_ENDERECO']}',
                DC_BAIRRO = '{$dados['DC_BAIRRO']}',
                DC_CIDADE = '{$dados['DC_CIDADE']}',
                NR_CASA = '{$dados['NR_CASA']}',
                DC_COMPLEMENTO = '{$dados['DC_COMPLEMENTO']}',
                DC_EMAIL = '{$dados['DC_EMAIL']}'
            WHERE CD_CLIENTE = {$dados['CD_CLIENTE']}";

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return 'Success';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function updateProduto($dados) {
    global $conn;

    $sql = "UPDATE produto SET  
                NM_PRODUTO = '{$dados['NM_PRODUTO']}', 
                VL_PRODUTO = {$dados['VL_PRODUTO']}
            WHERE CD_PRODUTO = {$dados['CD_PRODUTO']}";

    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return 'Success';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}