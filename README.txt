first i will talk about database :
ther are 9 tables 1 for users and 8 for communties.  
1-user 2-pr 3-hr 4-social 5-media 6-web 7-android 8-python 9-java
the user table:
the user_id is primary and all other tables connected with this key as forgien key.
to be understand more,if the user enter his all inputs for example:
firstname:mahmoud
lastname:samir
email:mahmoud3@gmail.com
phone:01270644863
.
.
.
committee:hr
question1:xxxxxxxxxxxx
question2:xxxxxxxxxxxx
question3:xxxxxxxxxxxx
question4:xxxxxxxxxxxx 

so look at hr table , you will find :
1-the user_id of mahmoud samir 
2-the answer of q1
3-the answer of q2
4-the answer of q3
5-the answer of q4
 
and so on for all users 
__________
i export the database twice with differant extention one is 
applicat.php ==> open with notepad , written as php array.
_DATABSE.odt ==> odt refer to  Open document text can be open by microsoft word online 
___________________________________________________________________
in validtion with php :
the inputs can't be submited if :
the email which is enterd is found befor 
or
the phone which is enterd not 11 number and not start by 012|011|015|010
 
the other validtion is done by html5 and javascript.
 
thanks !   