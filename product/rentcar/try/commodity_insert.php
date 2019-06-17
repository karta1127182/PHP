<?php

require __DIR__."/__connect_db.php";

$page_name="data_insert";
                $pBrand="";
                $pModel="";
                $pSit="";
                $pType="";
                $pOdo="";
                $pCc="";
                $pAge="";
                $pRent="";
                $rentState="";
                $rentAssign="";
                $shopAddressSelect="";

if(isset($_POST['checkme'])){
                $pBrand= htmlentities($_POST['pBrand']);
                $pModel= htmlentities($_POST['pModel']);
                $pSit= htmlentities($_POST['pSit']);
                $pType= htmlentities($_POST['pType']);
                $pOdo= htmlentities($_POST['pOdo']);
                $pCc= htmlentities($_POST['pCc']);
                $pAge= htmlentities($_POST['pAge']);
                $pRent= htmlentities($_POST['pRent']);
                $rentState= htmlentities($_POST['rentState']);
                $rentAssign= htmlentities($_POST['rentAssign']);
                $shopAddressSelect= htmlentities($_POST['shopAddressSelect']);



    $sql = "INSERT INTO `commodity` ( 
        `pBrand`, `pModel`, `pSit`, `pType`, `pOdo`, `pCc`, `pAge`, `pRent`
        , `rentState`, `rentAssign`, `shopAddressSelect`) VALUES 
      (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
            $stmt=$pdo->prepare($sql);
            $stmt->execute([
                isset($_POST["pBrand"]),
                isset($_POST["pModel"]),
                isset($_POST["pSit"]),
                isset($_POST["pType"]),
                isset($_POST["pOdo"]),
                isset($_POST["pCc"]),
                isset($_POST["pAge"]),
                isset($_POST["pRent"]),
                isset($_POST["rentState"]),
                isset($_POST["rentAssign"]),
                isset($_POST["shopAddressSelect"])
                // $_POST["pImg"]
            ]);
  

            if($stmt->rowCount()==1){
                $success=true;
                $msg=[
                    "type"=>"success",
                    "info"=>"商品新增成功",
                ];
            }else{
                $msg=[
                    "type"=>"danger",
                    "info"=>"商品新增失敗",
                    ];
                }
}
?>

<?php include __DIR__. '/__html_head.php';  ?>

    <style>
        .form-group small {
            color: red !important;
        }

    </style>
<div class="container">
    <div class="row">
        <div class="col-lg-6 pt-3">
            <?php if(isset($msg)):?>
                <div class="alert alert-<?=$msg["type"] ?>" role="alert">
                    <?= $msg["info"] ?>
                </div>
            <?php endif?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料   
                    </h5>
                    <form name="form1" method="post" onsubmit="return checkForm()">
                        <input type="hidden" name="checkme" value="check123">
                        <div class="form-group">
                            <label for="pBrand">廠牌</label>
                            <input type="text" class="form-control" id="pBrand" name="pBrand" placeholder="請輸入車子廠牌"
                                >
                            <small id="pBrandHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="pModel">車型(型號)</label>
                            <input type="text" class="form-control" id="pModel" name="pModel" placeholder="請輸入車子型號"
                                   >
                            <small id="pModelHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="pSit">幾人座</label>
                            <input type="text" class="form-control" id="pSit" name="pSit" placeholder="請輸入車子為幾人座"
                                   >
                            <small id="pSitHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="pType">車種</label>
                            <input type="text" class="form-control" id="pType" name="pType" placeholder="請輸入車子種類"
                                   >
                            <small id="pTypeHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="pOdo">里程數</label>
                            <input type="text" class="form-control" id="pOdo" name="pOdo" placeholder="請輸入車子排氣量"
                                   >
                            <small id="pOdoHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="pCc">排氣量</label>
                            <input type="text" class="form-control" id="pCc" name="pCc" placeholder="請輸入車子排氣量"
                                   >
                            <small id="pCcHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="pAge">車齡</label>
                            <input type="text" class="form-control" id="pAge" name="pAge" placeholder="請輸入車子年齡"
                                   >
                            <small id="pAgeHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="pRent">租金</label>
                            <input type="text" class="form-control" id="pRent" name="pRent" placeholder="請輸入車子每日租金"
                                   >
                            <small id="pRentHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group " style="display:none">
                            <label for="rentState">租借狀態</label>
                            <input type="text" class="form-control" id="rentState" name="rentState" placeholder=""
                                    value="<?= "1" ?>">
                            <small id="rentStateHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group " >
                            <label for="rentAssign">是否提供指定地點取車</label>
                            <br><select name="rentAssign" id="rentAssign">
                                    <option value="">請選擇</option>
                                    <option value="0">不提供</option>
                                    <option value="1">提供</option>       
                                </select>
                            <small id="rentAssignHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group ">
                            <label for="shopAddressSelect">是否提供甲租乙還</label>
                            <br><select name="shopAddressSelect" id="shopAddressSelect">
                                    <option value="">請選擇</option>
                                    <option value="0">不提供</option>
                                    <option value="1">提供</option>       
                                </select>
                            <small id="shopAddressSelectHelp" class="form-text text-muted"></small>
                        </div>
                        <form action="pic_doAction.php" method="post" enctype="multipart/form-data">照片上傳<br>
                            <input type="hidden" class="form-control"  name="MAX_FILE_SIZE" value="2097152">
                            <input type="file" name="myFile[]" id="" accept="image/jpeg,image/jpg,image/gif,image/png" multiple>
                            <input type="submit" value="上傳檔案">
                            <small id="pImgHelp" class="form-text text-muted"></small>
                        


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
   
<?php include __DIR__. '/__html_foot.php';  ?>
<script>
    


  

    const checkForm=()=>{
            let isPassed =true;
            const fields =[
        "pBrand",
        "pModel",
        "pSit",
        "pType",
        "pOdo",
        "pCc",
        "pAge",
        "pRent",
        "rentState",
        "rentAssign",
        "shopAddressSelect"
    ];
    
    let pBrand= document.form1.pBrand.value;
    let pModel= document.form1.pModel.value;
    let pSit= document.form1.pSit.value;
    let pType= document.form1.pType.value;
    let pOdo= document.form1.pOdo.value;
    let pCc= document.form1.pCc.value;
    let pAge= document.form1.pAge.value;
    let pRent= document.form1.pRent.value;
    let rentState= document.form1.rentState.value;
    let rentAssign= document.form1.rentAssign.value;
    let shopAddressSelect= document.form1.shopAddressSelect.value;
   

        //    for(let k in fields)
        // {
        //     document.querySelector('#'+fields[k]+'Help').innerHTML='';
        //     document.form1[fields[k]].style.borderColor='#cccccc';
        // }
          
            if (pBrand===''){
                document.querySelector('#pBrandHelp').innerHTML='請填入車子廠牌!!!';
                document.form1.pBrand.style.borderColor='red';
                isPassed=false;
            };
            if (pModel===''){
                document.querySelector('#pModelHelp').innerHTML='請填入車型(型號)!!!';
                document.form1.pModel.style.borderColor='red';
                isPassed=false;
            };
            if (pSit===''){
                document.querySelector('#pSitHelp').innerHTML='請填入車為幾人座!!!';
                document.form1.pSit.style.borderColor='red';
                isPassed=false;
            };
            if (pType===''){
                document.querySelector('#pTypeHelp').innerHTML='請填入車種!!!';
                document.form1.pType.style.borderColor='red';
                isPassed=false;
            };
            if (pOdo===''){
                document.querySelector('#pOdoHelp').innerHTML='請填入里程數!!!';
                document.form1.pOdo.style.borderColor='red';
                isPassed=false;
            };
            
            if (pCc===''){
                document.querySelector('#pCcHelp').innerHTML='請填入排氣量!!!';
                document.form1.pCc.style.borderColor='red';
                isPassed=false;
            };
            if (pAge===''){
                document.querySelector('#pAgeHelp').innerHTML='請填入車齡!!!';
                document.form1.pAge.style.borderColor='red';
                isPassed=false;
            };
            if (pRent===''){
                document.querySelector('#pRentHelp').innerHTML='請填入租金/(天)!!!';
                document.form1.pRent.style.borderColor='red';
                isPassed=false;
            };
            if (rentState===''){
                document.querySelector('#rentStateHelp').innerHTML='請填入租借狀態!!!';
                document.form1.rentState.style.borderColor='red';
                isPassed=false;
                
            };
            if (rentAssign===''){
                document.querySelector('#rentAssignHelp').innerHTML='請填入是否提供指定地點取車(是/否)!!!';
                document.form1.rentAssign.style.borderColor='red';
                isPassed=false;
            };
            if (shopAddressSelect===''){
                document.querySelector('#shopAddressSelectHelp').innerHTML='請填入是否提供甲租乙還(是/否)!!!';
                document.form1.shopAddressSelect.style.borderColor='red';
                isPassed=false;
            };
            return isPassed;
    };
        

    

</script>