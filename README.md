# Login-Page-with-Email-Verification

Project Proposal
LOGIN PAGE WITH EMAIL VERIFICATION

1. Motivation (
Secure user authentication is a foundational need for any web-based application. The motivation behind this project is to create a lightweight, secure, and easy-to-deploy login and registration system with email verification, using PHP and MySQL. This helps ensure only verified users can access services, mitigating spam and unauthorized access, while building familiarity with core web technologies.
________________________________________
 2. Project Goals and Milestones 
Milestone	Description
User Interface Setup	Design registration and login forms using HTML/CSS
Database Design	Create a user table with fields for verification and tokens
Registration Functionality	Collect data, hash password, store user, generate token
Email Verification Integration	Send verification email using PHPMailer
Email Confirmation Page	Verify token and activate user account
Login Authentication	Allow verified users to log in securely
Optional Features	Implement "Remember Me", "Forgot Password"
________________________________________
 3. Project Approach 
This project uses a monolithic architecture approach where both frontend and backend are served together via PHP. The process includes:
1.	Registration:
o	User submits name, email, password.
o	Backend hashes password and stores data along with a token.
o	Sends email with a tokenized verification link.
2.	Email Verification:
o	User clicks the verification link.
o	Backend validates token and activates the account.
3.	Login:
o	Backend checks credentials and whether email is verified.
o	Uses password_verify() for password matching.
4.	Security Features:
o	Password hashing (password_hash())
o	Email token randomization (bin2hex(random_bytes()))
o	Input validation and basic SQL protection
5.	Tools & Libraries:
o	PHPMailer for sending emails
o	XAMPP for local development
o	phpMyAdmin for database interaction
________________________________________
 4. System Architecture 
 
 High-Level Diagram
________________________________________
 5. Project Outcome / Deliverables (1 pt)
•	A fully functional login and registration system
•	Email-based verification before login
•	Secure password handling and session management
•	Clear documentation and extensibility for future features
________________________________________
 6. Assumptions
•	SMTP access is available for sending verification emails.
•	Users will access the system through modern browsers.
•	PHP 7.4+ and MySQL are installed (tested in XAMPP).
•	Hosting will support mail() or external SMTP via PHPMailer.

