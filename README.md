# payroll-management
EMPLOYEE MODULE:
Each employee, after login has the following functionalities:

Change password:
When an admin adds a new employee into the database, he/she is given a default password. Therefore, for security purposes each employee can change their password using this feature.

Show salary slip:
Each employee can view their current salary slip. They can even download it in pdf format for official purposes.

Show payment history:
Each employee can view their payment history. This feature will show all the previous instances when that employee’s salary is calculated in the database. 

ADMIN MODULE:
Each admin has the following functionalities and privileges:
Add new employee:
An admin can add new employees to the database. They enter all the necessary information into the database. This information includes Name of the employee, Designation, Email, Contact Nos, Date of Birth, Address, Gender, Class. A trigger has been implemented to add a row in the salary table to ensure that there is only one record for each employee. Hence when a new employee is added a row with their employee ID is created in the salary table.

Calculate Salaries:
This feature is the central feature of payroll management system. Admins can calculate the salaries of all employees of a particular class with a single click. Salaries are calculated on the basis of working days entered by the admins.
[Net Salary] = ((([Basic] + [Grade Pay] + [Dearance Allowance] + [House Rent Allowance]) - ([Provident Fund] + [Tax])) / 30) * [Working Days]);
The above formula is implemented to calculate net salary.

Show all salaries:
This feature shows current salaries of all employees. 

Update Class Definition:
This feature enables the admin to change the definition of a class. Which means, to update the Basic, Grade Pay, Pay Scale. 
