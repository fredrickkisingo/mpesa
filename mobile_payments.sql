-- CREATE table mobile_payments(
-- 	transLoID int AUTO_INCREMENT not null,
-- 	TransactionType varchar(10) not null,
-- 	TransID varchar(10) not null,
-- 	TransTime varchar(14) not null,
-- 	TransAmount varchar(6) not null,
-- 	BusinessShortCode varchar(6) not null,
-- 	BillRefNumber varchar(6) not null,
-- 	InvoiceNumber varchar(6) not null,
-- 	OrgAccountBalance varchar(10) not null,
-- 	ThirdPartyTransID varchar(10) not null,
-- 	MSISDN varchar(14) not null,
-- 	FirstName varchar(10),
-- 	MiddleName varchar(10),
-- 	LastName varchar(10),
-- 	PRIMARY KEY (transLoID),
-- 	UNIQUE(TransID)
-- ) Engine=innoDB;

-- 		CREATE table callback_push(
--         id int AUTO_INCREMENT not null,
-- 		MerchantRequestID 	varchar(191),	
--         CheckoutRequestID varchar(191),	
--         ResultCode	int(11),
-- 		ResultDesc	varchar(191),	
-- 		Amount	double(10,2) not null,	
-- 		MpesaReceiptNumber	varchar(191)not null,	
-- 		Balance	varchar(191)not null,
-- 		TransactionDate	varchar(191)not null,
-- 		PhoneNumber	varchar(191)not null,
--         PRIMARY KEY (id),
--         UNIQUE(MerchantRequestID)  
--             );