-- An Orm Apart -- Tuesday 21st of April 2020 10:10:10 AM
--
-- If database does not exist, create the database
-- CREATE DATABASE IF NOT EXISTS docent1;
USE `Student7`;
-- With the MySQL FOREIGN_KEY_CHECKS variable,
-- you don't have to worry about the order of your
-- DROP and CREATE TABLE statements at all, and you can
-- write them in any order you like, even the exact opposite.
SET FOREIGN_KEY_CHECKS = 0;

-- modernways.be
-- created by an orm apart
-- Entreprise de modes et de manières modernes
-- MySql: CREATE TABLE Person
-- Created on Tuesday 21st of April 2020 10:10:10 AM
--
DROP TABLE IF EXISTS `Person`;
CREATE TABLE `Person` (
                          `FirstName` NVARCHAR (50) NOT NULL,
                          `LastName` NVARCHAR (120) NOT NULL,
                          `Email` NVARCHAR (255) NULL,
                          `Address1` NVARCHAR (255) NULL,
                          `Address2` NVARCHAR (255) NULL,
                          `PostalCode` VARCHAR (20) NULL,
                          `City` NVARCHAR (80) NULL,
                          `CountryId` INT NULL,
                          `Phone1` VARCHAR (25) NULL,
                          `Birthday` DATETIME NULL,
                          `Rating` INT NULL,
                          `Id` INT NOT NULL AUTO_INCREMENT,
                          CONSTRAINT PRIMARY KEY(Id),
                          CONSTRAINT fk_PersonCountryId FOREIGN KEY (`CountryId`) REFERENCES `Country` (`Id`));

-- modernways.be
-- created by an orm apart
-- Entreprise de modes et de manières modernes
-- MySql: CREATE TABLE Country
-- Created on Tuesday 21st of April 2020 10:10:10 AM
--
DROP TABLE IF EXISTS `Country`;
CREATE TABLE `Country` (
                           `Name` NVARCHAR (50) NOT NULL,
                           `Code` NVARCHAR (2) NULL,
                           `Id` INT NOT NULL AUTO_INCREMENT,
                           CONSTRAINT PRIMARY KEY(Id),
                           CONSTRAINT uc_Country_Name UNIQUE (Name),
                           CONSTRAINT uc_Country_Code UNIQUE (Code));

-- modernways.be
-- created by an orm apart
-- Entreprise de modes et de manières modernes
-- MySql: CREATE TABLE Role
-- Created on Tuesday 21st of April 2020 10:10:10 AM
--
DROP TABLE IF EXISTS `Role`;
CREATE TABLE `Role` (
                        `Name` NVARCHAR (50) NOT NULL,
                        `Id` INT NOT NULL AUTO_INCREMENT,
                        CONSTRAINT PRIMARY KEY(Id),
                        CONSTRAINT uc_Role_Name UNIQUE (Name));

-- modernways.be
-- created by an orm apart
-- Entreprise de modes et de manières modernes
-- MySql: CREATE TABLE User
-- Created on Tuesday 21st of April 2020 10:10:10 AM
--
DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
                        `Name` NVARCHAR (50) NOT NULL,
                        `Salt` NVARCHAR (255) NULL,
                        `HashedPassword` NVARCHAR (255) NOT NULL,
                        `PersonId` INT NULL,
                        `RoleId` INT NULL,
                        `Id` INT NOT NULL AUTO_INCREMENT,
                        CONSTRAINT PRIMARY KEY(Id),
                        CONSTRAINT uc_User_Name UNIQUE (Name),
                        CONSTRAINT fk_UserPersonId FOREIGN KEY (`PersonId`) REFERENCES `Person` (`Id`),
                        CONSTRAINT fk_UserRoleId FOREIGN KEY (`RoleId`) REFERENCES `Role` (`Id`));

-- modernways.be
-- created by an orm apart
-- Entreprise de modes et de manières modernes
-- MySql: CREATE TABLE EventCategory
-- Created on Tuesday 21st of April 2020 10:10:10 AM
--
DROP TABLE IF EXISTS `EventCategory`;
CREATE TABLE `EventCategory` (
                                 `Name` NVARCHAR (120) NOT NULL,
                                 `Id` INT NOT NULL AUTO_INCREMENT,
                                 CONSTRAINT PRIMARY KEY(Id),
                                 CONSTRAINT uc_EventCategory_Name UNIQUE (Name));

-- modernways.be
-- created by an orm apart
-- Entreprise de modes et de manières modernes
-- MySql: CREATE TABLE EventTopic
-- Created on Tuesday 21st of April 2020 10:10:10 AM
--
DROP TABLE IF EXISTS `EventTopic`;
CREATE TABLE `EventTopic` (
                              `Name` NVARCHAR (120) NOT NULL,
                              `Id` INT NOT NULL AUTO_INCREMENT,
                              CONSTRAINT PRIMARY KEY(Id),
                              CONSTRAINT uc_EventTopic_Name UNIQUE (Name));

-- modernways.be
-- created by an orm apart
-- Entreprise de modes et de manières modernes
-- MySql: CREATE TABLE Event
-- Created on Tuesday 21st of April 2020 10:10:10 AM
--
DROP TABLE IF EXISTS `Event`;
CREATE TABLE `Event` (
                         `Name` NVARCHAR (120) NOT NULL,
                         `Location` NVARCHAR (120) NOT NULL,
                         `Starts` DATETIME NULL,
                         `Ends` DATETIME NULL,
                         `Image` NVARCHAR (255) NOT NULL,
                         `Description` NVARCHAR (1024) NOT NULL,
                         `OrganiserName` NVARCHAR (120) NOT NULL,
                         `OrganiserDescription` NVARCHAR (120) NOT NULL,
                         `EventCategoryId` INT NULL,
                         `EventTopicId` INT NULL,
                         `Id` INT NOT NULL AUTO_INCREMENT,
                         CONSTRAINT PRIMARY KEY(Id),
                         CONSTRAINT fk_EventEventCategoryId FOREIGN KEY (`EventCategoryId`) REFERENCES `EventCategory` (`Id`),
                         CONSTRAINT fk_EventEventTopicId FOREIGN KEY (`EventTopicId`) REFERENCES `EventTopic` (`Id`));

-- With the MySQL FOREIGN_KEY_CHECKS variable,
-- you don't have to worry about the order of your
-- DROP and CREATE TABLE statements at all, and you can
-- write them in any order you like, even the exact opposite.
SET FOREIGN_KEY_CHECKS = 1;

