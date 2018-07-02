PAYROLL MANAGEMENT SYSTEM DOCUMENTATION

NOTE: Read this document well to understand and install the DB and how the system work

//.....WARNING.....

1.DO NOT touch or edit usersFunction.php file or any other file if you don't understand.
2.It is recommended you do backup orignal folder in different location before editing any file.



//......INSTALLING THE DB TALBELS.........

1.Install Wampserver or Xampsever.
2.In the root folder..find the folder name readme ...find SQL file name payroll
3.Open it and highlit it by pressing CTL+A to copy all.
4.Go to phpmyadmin and on the tab named SQL.click it and in the textarea, past it
and hit go.IT will create the database and tables for you.

Done!!


//......Sample username and password to test or better still create some.......

ADMIN LOGIN
......................................
Username:	clement
password:	admin1

......................................

MANAGER LOGIN
.....................................
username:	manager
password:	manager1
.....................................

EMPLOYEE LOGIN
.....................................
username:	employee
password:	emp1
....................................
username:	blessed
password:	bless
....................................
username:	solomon
password:	kingot
....................................


//.......INTERPRETATION OF THE DB TALBES......

The database payroll contains 8 tables


1.admin table : contains admistrator username and password login details

2.emplog table:	contains employee username and password login details

3.managerlog table: contains manager username and password login details

4.company table:  contains company setting details

5.inbox table: contains inbox content details

6. outbox table: contains sent messages content details

7.employee tabel: contains employee details 

8.payroll table: contains payment details of employees
............................................................
Note : Don't be confused with the payroll table and database named payroll...it works , it does not matter.
............................................................

//......OVERVIEW OF THE SYSTEM.....

//.....Administrator work

The system is basic payroll management system

1.The administrator register employee.

2.Edit, delete, generate password for employees

3.The administrator generated temporary username and password for employee.

4.The employee need to activate his account by going to home and click on activate account and 
provide the neccessary information to activate it before he can use the account or login

4.All the registered employee will be listed on the manager page...employee list tabe or link


//.........Manager work...

1.Edit company setting by changing level of per day at any time.

2.Paying employees

3.printing salary report of employee



//........Employee...
1.print salary report.
2.send messages




