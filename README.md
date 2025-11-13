<div align="center">
  <br />
      <!-- <img src=""> -->
      <h1>Booking</h1>
  <br />

  <div>
    <img src="https://img.shields.io/badge/-Bootstrap-black?style=for-the-badge&logoColor=white&logo=bootstrap&color=9561fb" alt="Bootstrap" />
    <img src="https://img.shields.io/badge/-Javascript-black?style=for-the-badge&logoColor=white&logo=Javascript&color=06B6D4" alt="Tailwind CSS" />
    <img src="https://img.shields.io/badge/-CodeIgniter_4-black?style=for-the-badge&logoColor=white&logo=CodeIgniter&color=cb4516" alt="CodeIgniter" />
    <img src="https://img.shields.io/badge/-Mysql-black?style=for-the-badge&logoColor=white&logo=Mysql&color=3e6e93" alt="Mysql" />
  </div>

  <h3 align="center">A Hotel and Trip booking app.</h3>
</div>


## <a name="introduction">🤖 Introduction</a>

Built with Bootstrap, JavaScript, Codeigniter 4 and MySql. this web app is a Hotel and Trip Booking app. It provides users with a seamless browsing experience, Hotel and trip based on location. The app leverages modern UI/UX principles for a responsive and visually appealing interface, ensuring real-world scalability and performance.

If you're getting started and need assistance or face any bugs, Don't forget to ping me up..



## <a name="tech-stack">⚙️ Tech Stack</a>

- Bootstrap

- JavaScript

- Codeigniter 4 

- MySql


## <a name="quick-start">🤸 Quick Start</a>

Follow these steps to set up the project locally on your machine.

**Prerequisites**

Make sure you have the following installed on your machine:

- [Git](https://git-scm.com/)

- [Node.js](https://nodejs.org/en)

- [PHP & MySql](https://www.wampserver.com/en/)

- [Composer](https://getcomposer.org/) (A Dependency Manager for PHP)

**Cloning the Repository**

```bash

git clone https://github.com/thetechieakash/booking.git

cd booking

```

**Installation**

Install the project dependencies using composer:

```bash

composer install

```

**Set Up Environment Variables**

make `env` to `.env` (add `.`) file and uncomment following content:

```env

database.default.hostname = localhost
database.default.database = booking_db
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306

```

Replace the placeholder values with your actual MySql database credentials.

**Create a Database**

Create a database name as 

`database.default.database = booking_db ` 

**Migrate Database**

```bash

php spark migrate

```

**OR**



**Insert Default DB seeder**

```bash

php spark db:seed AdminSeeder

php spark db:seed AmenitiesSeeder

```
## Optional Seeders

Demo Hotels
```bash

php spark db:seed HotelSeeder

```
User
```bash

php spark db:seed UserSeeder

```



## Running the Project

```bash

php spark serve

```

**Default Admin credentials**

`Username = SAdmin`

`Password = 123465`

**Default User credentials**

`Username = SAdmin`

`Password = 123456`