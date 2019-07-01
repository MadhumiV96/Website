// JavaScript Document

function checkLogin(){
                var e=document.getElementById('uid').value;
                var p=document.form1.password.value;
                
                if(e=="" && p==""){
                    document.getElementById('error').innerHTML="Empty Username and Empty Password";
                    document.getElementById('uid').focus();
                    return false;
                }
                else if(e!="" && p==""){
                    document.getElementById('error').innerHTML="Empty Password";
                    document.getElementById('pid').focus();
                    return false; 
                }
                
                else if(e=="" && p!=""){
                    document.getElementById('error').innerHTML="Empty Username";
                    document.getElementById('uid').focus();
                    return false; 
                }
            }
