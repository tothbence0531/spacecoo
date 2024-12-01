# Space Coo - Test-Taking Application  

## Overview  
**Space Coo** is a modern, responsive web application designed to facilitate the creation, management, and completion of various tests. It supports both registered and guest users, offering a seamless user experience with features like live search, dark/light mode, and user profile management. 

This project was developed as a semester-long assignment for the **Databases course** at the **University of Szeged (SZTE)** during the **third semester**.

## Features  
- **User Roles & Access Control**  
  - **Guests**: Can register to become regular users.  
  - **Registered Users**: Can take tests and view their results.  
  - **Teachers/Admins**: Can create and manage tests and test questions.  
  
- **Test Status Tracking**  
  - Users can see whether they have completed a test, passed it, or failed to meet the minimum score.  
  
- **Modern, Responsive Design**  
  - Fully responsive UI built with **Bootstrap 5.3** for a seamless experience on all devices.  
  - **Light/Dark Mode** toggle for personalized appearance.  
  
- **Live Search Engine**  
  - Real-time search functionality powered by **PHP** for quick navigation through tests.  
  
- **User Management**  
  - **User Profiles**: Update personal information.  
  - **Password Management**: Secure password change feature.  
  
- **Online User Visibility**  
  - See which users are currently online.  
  
## Technologies Used  
- **Backend**: PHP  
- **Frontend**: Bootstrap 5.3, JavaScript
- **Database**: MySql  

## Installation  

1. **Clone the Repository**  
   ```bash
   git clone https://github.com/yourusername/space-coo.git  
   cd space-coo
   ```

2. **Set Up the Database**

- Create a database and import the provided SQL file.
- Update the database configuration in **/classes/class.dbh.php**.
- Start the Server

3. **Configure your local server (e.g., Apache, Nginx).**
- Place the project in your server’s root directory and access it via your browser.
## Usage
- Navigate to the homepage to register or log in.
- Access the available tests and track your progress.
- Admins and teachers can manage tests through the dedicated dashboard.
### Test accounts
#### Teacher: 
- email: teszttanar@gmail.com 
- password: asd123A!
#### Student 1
- email: tesztdiak1@gmail.com
- password: asd123A!
#### Student 2
- email: tesztdiak2@gmail.com
- password: asd123A!
## Future Enhancements
- Multilingual Support
- Analytics Dashboard for test performance tracking.
- Notifications for upcoming tests and results.
