<?php

use yii\db\Migration;

class m170106_142955_product_data extends Migration
{
    private $department = array();
    private $category = array();
    private $group = array();
    private $product = array();
    
    
    public function up()
    {
        
        $this->delete('{{%price_history}}');
        $this->delete('{{%product}}');
        $this->delete('{{%category}}');
        $this->delete('{{%group}}');
        $this->delete('{{%department}}');
        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->getCsvFile('product.csv');
        
        $this->insertDepartment();
        
        $this->insertGroup();
        
        $this->insertCategory();
       
        $this->insertProduct();
        
        $this->insertPriceHistory();
        
    }

    public function down()
    {
        $this->delete('{{%price_history}}');
        $this->delete('{{%product}}');
        $this->delete('{{%category}}');
        $this->delete('{{%group}}');
        $this->delete('{{%department}}');
        
    }
    
    protected function insertDepartment()
    {
        if(!empty($this->department))
        {
            foreach($this->department as $department)
            {
                $this->insert('{{%department}}', array(
                    'title'=>$department['title'],
                    'landHeader' =>$department['landHeader'],
                    'landTitle'=>$department['landTitle'],
                    'id'=>$department['id']));
            }
        }
        else {
            throw new \yii\web\HttpException(404, 'Array department does not exist');
        }
            
    }
    
    protected function insertGroup()
    {
        if(!empty($this->group))
        {
            foreach($this->group as $group)
            {
                $this->insert('{{%group}}', array(
                    'title'=>$group['title'], 
                    'id'=>$group['id'], 
                    'id_department'=>$group['id_department']));
            }
        }
        else {
            throw new \yii\web\HttpException(404, 'Array group does not exist');
        }
            
    }
    
    protected function insertCategory()
    {
        if(!empty($this->category))
        {
            foreach($this->category as $category)
            {
                $this->insert('{{%category}}', array(
                    'title'=>$category['title'], 
                    'id'=>$category['id'], 
                    'id_department'=>$category['id_department'], 
                    'id_group'=>$category['id_group']));
            }
        }
        else {
            throw new \yii\web\HttpException(404, 'Array category does not exist');
        }
    }
    
    protected function insertProduct()
    {
        if(!empty($this->product))
        {
            foreach($this->product as $product)
            {                
                $this->insert('{{%product}}',array(
                    'title'=>$product['title'],
                    'variant_title'=>$product['variant_title'],
                    'vendor_code'=>$product['vendor_code'],
                    'description'=>$product['description'],
                    'short_description'=>'lorem ip sum set amit zyquit',
                    'grouping'=>$product['grouping'],
                    'display'=>$product['display'],
                    'id'=>$product['id'], 
                    'id_department'=>$product['id_department'], 
                    'id_group'=>$product['id_group'],
                    'id_category'=>$product['id_category'],
                    'skin'=>$product['skin'],
                    'flavor'=>$product['flavor'],
                    'amount'=>$product['amount'],                        
                    'title'=>$product['title'],
                    'brand'=>$product['brand'],               
                    'vendor_code'=>$product['vendor_code'],                                    
                    'weight' => $product['weight'],
                    'volume' => $product['volume'],
                    'rgb' => $product['rgb'],
                    'consist' => $product['consist'],
                    'packaging' => $product['packaging'],
                    'applications' => $product['applications'],
                    'with_use' => $product['with_use'],
                    'necessary' => $product['necessary'],
                    'useful' => $product['useful'],
                    'description' => $product['description'],
                    'short_description' => $product['short_description'],
                    'tag_search' => $product['tag_search'],               
                    'created_at'=>time(),
                    'updated_at'=>time(),
                ));
            }
        }
        else {
            throw new \yii\web\HttpException(404, 'Array product does not exist');
        }
    }
    
    protected function insertPriceHistory()
    {
        $tbl = '{{%price_history}}';
        if(!empty($this->product))
        {
            foreach($this->product as $product)
            {
                $this->insert($tbl, array(
                'id_product'=>$product['id'],
                'price'=>$product['price'],
                'created_at'=>time(),
                ));
            }
            return true;
        }
        else {
            throw new \yii\web\HttpException(404, 'Array product does not exist');
        }
             
    }
    
    
    private function getCsvFile($filename)
    {
        $row = 1;
        $stack = null;
        $grouping = 1;
        $flag = 0;
        $handle = fopen("console/files/product.csv", "r");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            if($this->isDepartment($data))
                $this->department[] = array(
                    'title'=>$this->trimData($data[1]),
                    'landHeader' =>$this->trimData($data[1]),
                    'landTitle'=>$this->trimData($data[1]),
                    'id'=>count($this->department)+1,
                    );
            if($this->isGroup($data))
            {
              $g_d = end($this->department);
              $this->group[] = array(
                  'title' =>$this->trimData($data[2]),
                  'department' => $g_d['title'],
                  'id_department' => count($this->department),
                  'id' => count($this->group)+1
                  );  
            }
            if($this->isCategory($data))
            {
              $c_g = end($this->group);
              $this->category[] = array(
                  'title'=>$this->trimData($data[3]), 
                  'group'=>$c_g['title'],
                  'id_group'=>count($this->group),
                  'department'=>end($this->department), 
                  'id_department'=>count($this->department),
                  'id'=>count($this->category)+1
                  );
            }
            if(!empty($data[4]) && empty($data[2]))
            {
              $p_d = end($this->department); 
              $p_g = end($this->group);
              $p_c = end($this->category);
              
              if($this->isProduct($data))
              {
                  if($this->checkStar($data[4]))
                  {
                    $p_d = end($this->department); 
                    $p_g = end($this->group);
                    $p_c = end($this->category);
                    $this->product[] = array(
                        'id'=>count($this->product)+1,
                        'group'=>$p_g['title'],
                        'id_group'=>count($this->group),
                        'department'=>$p_d['title'], 
                        'id_department'=>count($this->department),
                        'category'=>$p_c['title'],
                        'id_category'=>count($this->category),
                        'skin'=>$this->trimData($data[14]),
                        'flavor'=>$this->trimData($data[13]),
                        'amount'=>$this->trimData($data[12]),                        
                        'title'=>$this->trimData($data[4]),
                        'brand'=>$this->trimData($data[6]),               
                        'vendor_code'=>$this->trimData($data[7]),
                        'price'=>$this->trimData($data[8]),
                        'variant_title'=>'',          
                        'weight' => $this->trimData($data[11]),
                        'volume' => $this->trimData($data[10]),
                        'rgb' => $this->trimData($data[15]),
                        'consist' => $this->trimData($data[18]),
                        'packaging' => $this->trimData($data[19]),
                        'applications' => $this->trimData($data[20]),
                        'with_use' => $this->trimData($data[21]),
                        'necessary' => $this->trimData($data[22]),
                        'useful' => $this->trimData($data[23]),
                        'description' => $this->trimData($data[17]),
                        'short_description' => $this->trimData($data[9]),
                        'tag_search' => $this->trimData($data[16]),               
                        'grouping'=>0,
                        'display'=>1,
                        );
                    if($flag)
                    {
                        $grouping++;
                        $flag = 0;
                    }                    
                        
                  }
                  else
                  {
                    if(!$flag)
                        $display = 1;
                    else
                        $display = 0;
                    $p_d = end($this->department); 
                    $p_g = end($this->group);
                    $p_c = end($this->category);
                    $this->product[] = array(
                        'id'=>count($this->product)+1,
                        'grouping'=>$grouping,
                        'display'=> $display,
                        'group'=>$p_g['title'],
                        'id_group'=>count($this->group),
                        'department'=>$p_d['title'], 
                        'id_department'=>count($this->department),
                        'category'=>$p_c['title'],
                        'id_category'=>count($this->category),
                        'skin'=>$this->trimData($data[16]),
                        'flavor'=>$this->trimData($data[15]),
                        'amount'=>$this->trimData($data[14]),                        
                        'title'=>$this->trimData($stack),
                        'brand'=>$this->trimData($data[6]),               
                        'vendor_code'=>$this->trimData($data[7]),
                        'price'=>$this->trimData($data[8]),
                        'variant_title'=>trim($data[4]),                      
                        'weight' => $this->trimData($data[13]),
                        'volume' => $this->trimData($data[12]),
                        'rgb' => $this->trimData($data[18]),
                        'consist' => $this->trimData($data[18]),
                        'packaging' => $this->trimData($data[19]),
                        'applications' => $this->trimData($data[20]),
                        'with_use' => $this->trimData($data[21]),
                        'necessary' => $this->trimData($data[22]),
                        'useful' => $this->trimData($data[23]),
                        'description' => $this->trimData($data[17]),
                        'short_description' => $this->trimData($data[9]),
                        'tag_search' => $this->trimData($data[18]),                    
                        );
                    $flag = 1;
                  }

              }
              else 
              {
                    if($flag) //флаг выхода из группы
                    {
                        $grouping++;
                        $flag = 0;
                    }  
                  $stack = $data[4];
              }
                     
            }
            $row++;
        }
        fclose($handle);
        
        return true;
        
    }
    
    protected function trimData($data)
    {
        return str_replace("*", "", trim($data," \t\n\r\0\x0B"));
    }
    
    protected function checkStar($data)
    {
        $data = trim($data);
        if($data[0] == "*")
            return true;
        else
            return false;
    }
    
    protected function isProduct($data)
    {
        if(!(empty($data[7]) && empty($data[8])))
            return true;
        else
            return false;
    }
    
    protected function isDepartment($data)
    {
        if(!empty($data[1]) && empty($data[2]))
            return true;
        else
            return false;
    }
    
    protected function isGroup($data)
    {
        if(!empty($data[2]) && empty($data[3]))
            return true;
        else
            return false; 
    }
    
    protected function isCategory($data)
    {
        if(!empty($data[3]) && empty($data[2]))
            return true;
        else
            return false; 
        
    }
    
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
