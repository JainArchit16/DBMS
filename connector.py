import sys
import mysql.connector


import random
import string

import random
import string

def generate_random_integer():
    random_integer = ''.join(random.choices(string.digits, k=3))
    return int(random_integer)


def integer_exists_in_database(integer, database):
    return integer in database


database = set()









def displayDonor(id):
    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("use blood_donation_project")

    mycursor.execute("SELECT * FROM donor WHERE donor_id = '" + id + "';")
    a = mycursor.fetchall()
    mydb.commit()

    for row in a:
        print(row)
    mycursor.close()


def addDonor(StudentID,CampID,BloodType,Amount):
    print("yahan tk aaayr")
    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("use blood_donation_project")
    print()

#     mycursor.execute("""
# CREATE TRIGGER UpdateStores
# AFTER INSERT ON donates
# FOR EACH ROW
# BEGIN
#     UPDATE Stores
#     SET Quantity = Quantity + '{Amount}'
#     WHERE CampID = NEW.CampID AND BankID = (SELECT BankID FROM BloodBank WHERE BloodType = '{BloodType}');
# END;
# """)

    mycursor.execute(f"INSERT INTO donates (StudentID,CampID,StudentName,BloodType,Amount) VALUES ('{StudentID}', '{CampID}', (SELECT StudentName from student where StudentID='{StudentID}'), '{BloodType}', '{Amount}')" )
    a = mycursor.fetchone()
    mydb.commit()

    print(a)
    mycursor.close()


def findDonorForRecipient( city , blood_type):
    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("use blood_donation_project")
    print(blood_type)

    mycursor.execute(f" SELECT * FROM donor WHERE blood_type = '{blood_type}' ORDER BY CASE WHEN city = '{city}' THEN 0 ELSE 1 END, city;" )
    a = mycursor.fetchall()
    mydb.commit()

    print(a)
    mycursor.close()


def addReceiver(Name,ContactInfo,BloodType,Amount):

    while True:
        random_integer = generate_random_integer()
        if not integer_exists_in_database(random_integer, database):
            database.add(random_integer)
            break

    print("Your RecepientID:", random_integer)

    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("use blood_donation_project")

    mycursor.execute(f"INSERT INTO recepient (RecepientID,Name,ContactInfo,BloodType,Amount) VALUES ({random_integer}, '{Name}', '{ContactInfo}', '{BloodType}', '{Amount}')" )
    # a = mycursor.fetchone()
    mydb.commit()

    # print(a)
    mycursor.close()

def addBloodDonation(donor_id , blood_type , donation_amount , donation_center ):

    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("use blood_donation_project")

    mycursor.execute(f"INSERT INTO blooddonation (donor_id, recipient_id, donation_date, blood_type, donation_amount, donation_center) VALUES ('{donor_id}' , (SELECT recipient_id FROM recipient ORDER BY recipient_id DESC LIMIT 1) , CURRENT_DATE , '{blood_type}' , '{donation_amount}' , '{donation_center}');")
    a = mycursor.fetchone()
    mydb.commit()

    print(a)
    mycursor.close()

def addStudent(StudentID,StudentName,Semester,Branch,ContactInfo):
    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("use blood_donation_project")

    mycursor.execute(f"INSERT INTO student (StudentID,StudentName,Semester,Branch,ContactInfo) VALUES ('{StudentID}','{StudentName}','{Semester}','{Branch}','{ContactInfo}');")
    a = mycursor.fetchone()
    mydb.commit()

    print(a)
    mycursor.close()



def addCamp(CampID, CampName, date):
    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin", auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("USE blood_donation_project")

    # Use parameterized queries to safely insert data
    insert_query = "INSERT INTO bloodcamp (CampID, CampName, Date) VALUES (%s, %s, %s)"
    data = (CampID, CampName, date)

    mycursor.execute(insert_query, data)
    mydb.commit()

    print("Record inserted successfully")

    mycursor.close()




def addStore(CampID,BankID):
    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("use blood_donation_project")

    mycursor.execute(f"INSERT INTO stores (CampID,BankID) VALUES ('{CampID}','{BankID}');")
    a = mycursor.fetchone()
    mydb.commit()

    print(a)
    mycursor.close()

def addBloodBank(BankID):
    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("use blood_donation_project")

    mycursor.execute(f"INSERT INTO bloodbank (BankID,BloodType,Quantity) VALUES ('{BankID}','A+','0');")
    mycursor.execute(f"INSERT INTO bloodbank (BankID,BloodType,Quantity) VALUES ('{BankID}','A-','0');")
    mycursor.execute(f"INSERT INTO bloodbank (BankID,BloodType,Quantity) VALUES ('{BankID}','B-','0');")
    mycursor.execute(f"INSERT INTO bloodbank (BankID,BloodType,Quantity) VALUES ('{BankID}','O+','0');")
    mycursor.execute(f"INSERT INTO bloodbank (BankID,BloodType,Quantity) VALUES ('{BankID}','O-','0');")
    mycursor.execute(f"INSERT INTO bloodbank (BankID,BloodType,Quantity) VALUES ('{BankID}','AB-','0');")
    mycursor.execute(f"INSERT INTO bloodbank (BankID,BloodType,Quantity) VALUES ('{BankID}','B+','0');")
    a = mycursor.fetchone()
    mydb.commit()

    print(a)
    mycursor.close()

def addRating(StudentID,CampID,Rating):
    mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
    mycursor = mydb.cursor()
    mycursor.execute("use blood_donation_project")

    mycursor.execute(f"INSERT INTO rating (StudentID,CampID,Rating) VALUES ('{StudentID}','{CampID}','{Rating}');")
    a = mycursor.fetchone()
    mydb.commit()

    print(a)
    mycursor.close()

def updateBloodBank(CampID,BloodType,Quantity):
        mydb = mysql.connector.connect(host="localhost", user="admin", passwd="admin",
                                   auth_plugin='mysql_native_password')
        mycursor = mydb.cursor()
        mycursor.execute("use blood_donation_project")

        mycursor.execute(f"""
UPDATE bloodbank
SET Quantity = Quantity + {Quantity}
WHERE BloodType = '{BloodType}' AND BankID = (SELECT BankID FROM stores WHERE CampID = {CampID});

""")
        a = mycursor.fetchone()
        mydb.commit()

        print(a)
        mycursor.close()



















#displayDonor("A+")
#addDonor("12","name","lastname","20-1-2005","male" , "696969969696","test@gamil.com","Delhi","A+")

function_name = sys.argv[1]
args = [arg for arg in sys.argv[2:]]

# Call the specified function with the provided arguments and print its result
if function_name == "displayDonor":
    displayDonor(args[0])
    sys.exit(1)
    #result = function_one(args[0], args[1])
elif function_name == "addDonor":
    
    addDonor(args[0],args[1],args[2],args[3])
    #print("Usage: python myscript.py function_two [arg1] [arg2] [arg3]")
    sys.exit(1)
#result = function_two(args[0], args[1], args[2])

elif function_name == "findDonorForRecipient":
    findDonorForRecipient(args[0],args[1])
    #print("Usage: python myscript.py function_two [arg1] [arg2] [arg3]")
    sys.exit(1)
    
elif function_name == "addReceiver":
    addReceiver(args[0],args[1],args[2],args[3])
    sys.exit(1)
elif function_name == "addBloodDonation":
    addBloodDonation(args[0],args[1],args[2],args[3])
    sys.exit(1)
elif function_name == "addStudent":
    addStudent(args[0],args[1],args[2],args[3],args[4])
    sys.exit(1)
elif function_name == "addCamp":
    addCamp(args[0],args[1],args[2])
    sys.exit(1)   
elif function_name == "addStore":
    addStore(args[0],args[1])
    sys.exit(1)
elif function_name == "addBloodBank":
    addBloodBank(args[0])
    sys.exit(1)
elif function_name == "addRating":
    addRating(args[0],args[1],args[2])
    sys.exit(1)
elif function_name == "updateBloodBank":
    updateBloodBank(args[0],args[1],args[2])
    sys.exit(1)
else:
    print("Invalid function name")
    sys.exit(1)

#print(result)