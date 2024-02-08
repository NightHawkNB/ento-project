<html lang="en">
<?php $this->view('includes/head') ?>
<style>
    .verify-container{
   /* position: relative;
    max-width: 900px;*/
    width: 100%;
    background: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.verify-container header{
    font-size: 1.5rem;
    color: #333;
    font-weight: 500;
    text-align: center;
}
.verify-container .form{
    position: relative;
    /* border-style :solid;
    border-width: 5px; */
    top: 100%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 125%;
    display: flex;
    
  
}


.verify-container .form{
    margin-top: 30px;
}

.form .input-box{
    width: 100%;
    margin-top: 20px;
}
.input-box label{
    color: #333;
}

.form .input-box input{
    position: relative;
    height: 50px;
    width: 100%;
    outline: none;
    font-size: 1rem;
    color: #707070;
    margin-top: 8px;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 0 15px;
}

.form .colum{
    display: flex;
    column-gap: 10px;
}

.btn{ 
    justify-content: center;
    border: none;
    outline: none;
    border-radius: 8px;
    margin: 10px;
    padding: 20px;
    color: #333;
}

.verify-container .right{
    width: 100%;
    display: flex;
    flex-direction: column;
    margin: 10px;
}

.verify-container .left{
    width: 30%;
    display: flex;
    flex-direction: column;
    margin: 10px;
}
</style>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="cols-10">
            <div class="verify-container">
        <header>Profile</header>
        <form action="#" class="form">
            <div class="content">
                <div class="left">
                    <div class="input-box">
                        <label>Full Name</label>
                        <input type="text" placeholder="Enter your full name"/>
                    </div>
                    <div class="input-box">
                        <label>Address</label>
                        <input type="text" placeholder="Enter your address"/>
                    </div>
                    <div class="colum">
                        <div class="input-box">
                            <label>Age</label>
                            <input type="text" placeholder="Enter your age"/>
                        </div>
                        <div class="input-box">
                            <label>Gender</label>
                            <input type="text" placeholder="Enter your gender"/>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="photo">
                        <img src="/Users/sadeeisback/Desktop/idf.png" alt="id front" >
                        <br>
                        <img src="/Users/sadeeisback/Desktop/idb.png" alt="id back" >
                    </div>
                </div>
            </div>
            <div class="buttons">
                <button type="submit" class="btn">Verify</button>
                <button type="submit" class="btn">Declined</button>
            </div>
        </form>
    </div>
                </section>
        </main>
    </div>
</body>
</html>