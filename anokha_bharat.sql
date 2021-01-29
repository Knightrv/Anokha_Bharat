CREATE DATABASE anokha_bharat;

GRANT ALL ON anokha_bharat.* TO 'rishik'@'localhost' IDENTIFIED BY 'zap';
GRANT ALL ON anokha_bharat.* TO 'rishik'@'127.0.0.1' IDENTIFIED BY 'zap';


CREATE TABLE users(
user_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_name VARCHAR(128) DEFAULT NULL,
password VARCHAR(40) NOT NULL,
e_mail VARCHAR(128) NOT NULL UNIQUE,
INDEX(e_mail)
)ENGINE=InnoDB Charset=utf8;


CREATE TABLE packages(
package_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
package_name VARCHAR(128) DEFAULT NULL UNIQUE,
package_price FLOAT(10,2) DEFAULT NULL,
package_image VARCHAR(250) DEFAULT NULL,
package_text mediumtext DEFAULT NULL,
details_image VARCHAR(250) DEFAULT NULL,
image_desc VARCHAR(250) DEFAULT NULL,
duration INT UNSIGNED NOT NULL,
INDEX(package_name)
)ENGINE=InnoDB Charset=utf8;


CREATE TABLE enquiries(
enquiry_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
e_mail VARCHAR(128) NOT NULL,
subject VARCHAR(128) NOT NULL,
message mediumtext DEFAULT NULL,
status VARCHAR(128) NOT NULL,
)ENGINE=InnoDB Charset=utf8;


CREATE TABLE details(
details_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
package_name VARCHAR(100) NOT NULL UNIQUE,
place_title VARCHAR(100) NOT NULL,
description mediumtext DEFAULT NULL,
FOREIGN KEY (package_name) REFERENCES packages (package_name) ON DELETE CASCADE
)ENGINE=InnoDB Charset=utf8;

CREATE TABLE bookings(
booking_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_id INT UNSIGNED NOT NULL,
package_name VARCHAR(100) NOT NULL,
status VARCHAR(100) DEFAULT NULL,
booking_date timestamp NULL DEFAULT current_timestamp(),
from_date  DATE DEFAULT NULL,
to_date DATE DEFAULT NULL,
FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE,
FOREIGN KEY (package_name) REFERENCES packages (package_name),
)ENGINE=InnoDB Charset=utf8;


INSERT INTO users(user_name,password,e_mail) VALUES ('Rohit','abcd','rohit53@gmail.com');
INSERT INTO users(user_name,password,e_mail) VALUES ('Piyush','11234','piyushsharma@gmail.com');
INSERT INTO users(user_name,password,e_mail) VALUES ('Akash','abcd','akashdey@gmail.com');
INSERT INTO users(user_name,password,e_mail) VALUES ('Aman','abcd','amanroy12@gmail.com');
INSERT INTO users(user_name,password,e_mail) VALUES ('Pankaj','abcd','pankaj99@rediffmail.com');



INSERT INTO packages(package_name,package_price,package_image,package_text,details_image,image_desc,duration) VALUES ('Andhra Pradesh','12789.88','img/destination/andhra.jpg','Our exclusive Andhra Pradesh package is a 5 days and 4 nights tour.You will be accomadated in a neat and hygienic 3 star hotel which includes only complementary breakfast and accomodation fee.You will be given ac car for sight-seeing and this will include an optional trabel guide.For more details on places of visit click on detais :','img/destination/adpage.jpg','--Gandikota',5);

INSERT INTO packages(package_name,package_price,package_image,package_text,details_image,image_desc,duration) VALUES ('Bihar','15000.00','img/destination/Bihar.jpeg','Our exclusive Bihar package is a 6 days and 5 nights tour.You will be accomadated in a neat and hygienic 3 star hotel which includes only complementary breakfast and accomodation fee.You will be given ac car for sight-seeing and this will include an optional trabel guide.For more details on places of visit click on detais :','img/destination/biharpage.jpg','--Nalanda',6);

INSERT INTO packages(package_name,package_price,package_image,package_text,details_image,image_desc,duration) VALUES ('Jharkhand','11000.67','img/destination/jharkhand.jpg','Our exclusive Jharkhand package is a 4 days and 4 nights tour.You will be accomadated in a neat and hygienic 3 star hotel which includes only complementary breakfast and accomodation fee.You will be given ac car for sight-seeing and this will include an optional trabel guide.For more details on places of visit click on detais :','img/destination/jharkhandpage.jpg','--Dassam Falls',4);

INSERT INTO packages(package_name,package_price,package_image,package_text,details_image,image_desc,duration) VALUES ('Lakshadweep','18999.99','img/destination/lakshad..jpg','Our exclusive Lakshadweep package is a 4 days and 3 nights tour.You will be accomadated in a neat and hygienic 3 star hotel which includes only complementary breakfast and accomodation fee.You will be given ac car for sight-seeing and this will include an optional trabel guide.For more details on places of visit click on detais :','img/destination/lashadweeppage.jpg','--Banagram Island',4);



INSERT INTO bookings(user_id,package_id,status,from_date,to_date) VALUES (3,1,'Confirmed','2020-02-04','2020-02-08');
INSERT INTO bookings(user_id,package_id,status,from_date,to_date) VALUES (2,2,'Cancelled','2019-12-08','2019-12-14');
INSERT INTO bookings(user_id,package_id,status,from_date,to_date) VALUES (4,3,'Confirmed','2020-01-12','2020-01-16');
INSERT INTO bookings(user_id,package_id,status,from_date,to_date) VALUES (3,3,'Cancelled','2018-09-23','2018-09-27');
INSERT INTO bookings(user_id,package_id,status,from_date,to_date) VALUES (5,4,'Confirmed','2020-02-09','2020-02-12');


/************************Bihar_start******************************/

INSERT INTO details(package_name,place_title,description) VALUES ('Bihar','Nalanda','Also reffered as the "Ancient City of Learning",Nalanda,the most popular Mahavihara of the ancient times, a significant Buddhist seat of academic excellence and a modest pilgrim center, all wrapped in a wisp of spirituality, Nalanda continues to be an equally enriching location in the present. It offers vibrant substance of spirituality, history, culture, architecture, and tourism.This city houses one of the world\'s oldest and finest residential universities which itself was an architectural masterpiece.');

INSERT INTO details(package_name,place_title,description) VALUES ('Bihar','Madhubani','An ancient city, Madhubani in Bihar is known for the richness in art and culture that the district strives for. Mentioned in the Ramayana, the city is known for the world popular Madhubani paintings whose origin lie here.The town has multiple temples which are the main attraction points of the town for the locals.');

INSERT INTO details(package_name,place_title,description) VALUES ('Bihar','Lauriya Nandangarh','Lauriya Nandangarh is a small town situated 28 km northwest of Bettiah famous for its beautifully erected Ashokan Pillar. Lauriya gets its name from a pillar (Laur) of Mauryan emperor Ashoka, which is sited here. Nandangarh is the name of a bank, located about 2 km to the south-west of the Ashoka Pillar. Lauriya Nandangarh is also a site for about 20 archaeological banks organized in three rows. Forty pillars were built here by Emperor Ashoka originally but today only one pillar exists in complete form, at its initial position in Lauriya Nandangarh.');

INSERT INTO details(package_name,place_title,description) VALUES ('Bihar','Tomb of Sher Shah Suri','Situated in the town Sasaram in the state of Bihar in India, Tomb of Sher Shah Suri is a stunning mausoleum which has been dedicated to the memory of Emperor Sher Shah Suri. Boasting of Indo- Islamic architecture, the tomb is also known as the ‘Second Taj Mahal of India’ colloquially. Built in red sandstone, the monument is three storeys tall and stands in the centre of a picturesque lake, adding to the ambiance and beauty of it.');

INSERT INTO details(package_name,place_title,description) VALUES ('Bihar','Rajgir','Rajgir is town where the air that surrounds its beautiful sceneries carries hints of spirituality and vibrant hues of history with links with both Buddhism and Jainism.Set in a green valley and surrounded by rocky hills, Rajgir is a spiritual town with natural serenity amongst the dense forests, mysterious caves and springs. Rajgir houses many religious destinations which are majorly dedicated to either Buddhism or Jainism. Both lord Buddha and Lord Mahavir have said to spent time here giving it huge spiritual and religious importance. One can visit various ruins, temples and sites here and also spend some time indulging in its refreshing calmness.');


INSERT INTO details(package_name,place_title,description) VALUES ('Bihar','Jal Mandir','Located in Pawapuri in the state of Bihar, Jal Mandir is a revered Jain temple which is dedicated to the 24th Tirthankara- Lord Mahavir. Also known as Apapuri, the gorgeous white marble temple marks the cremation spot of Lord Mahavir and is a sacred pilgrimage centre of Jainism. The gorgeous temple is constructed within a huge water tank that is filled pretty pink lotus flowers. Considered to be one of the top five Jain temples in the region, the temple has "Charan Paduka" or foot impression of Lord Mahavir as the central deity.');

INSERT INTO details(package_name,place_title,description) VALUES ('Bihar','Vaishali','Located in the interiors of Bihar, Vaishali is a small district which is also a revered Hindu, Buddhist and Jain worshipping site. It is the city where Lord Mahavir was born. Considered as the first republic of the world, Vaishali is believed to have been named after King Vishal, from the time of Mahabharat.It is also the city where Buddha delivered his last sermon. Surrounded by groves of mango and banana and extensive rice field, it is now a part of Trihut division of Bihar.Lord Buddha has spent a significant time of his life here and he used to visit Vaishali every now and then. Also, his last sermon was held here in Vaishali, which marks the town as an extremely significant center for Buddhism. To mark this event King Ashoka, who embraced Buddhism after the massacre of Kalinga, he decided to erect one of his remarkable pillars here. Apart from Buddhists, Vaishali is revered as a holy place by Jains because it also happens to be Lord Mahavira\'s birth place.');

//********************Jharkhand_start***************************************************/

INSERT INTO details (package_name,place_title,description) VALUES ('Jharkhand','Netarhat Hill Station','Also reffered as the "Heart of Jharkhand",One of the least overhyped, but amazingly scenic and beautiful locations in Jharkhand. With its soothing climate and temperature, a mystic idyllic sunrise in the Magnolia Viewpoint, Netarhat remains clad with flora and fauna. It is among the unexplored places in Jharkhand, but again it is unparalleled in its tranquillity as well as its beauty. It becomes a favourite with every tourist, once they discover its beauty.');

INSERT INTO details (package_name,place_title,description) VALUES ('Jharkhand','Dassam Falls','The most important fall where you can enjoy the cascading water. The rustling sound will give a solace which you might have never felt in life. Dassam Fall is situated in Taimara village in Bundu a suburb near Ranchi. The word Dassam itself in mundari language means pouring water. The river Subarnarekha breaks into the fall with a height of 44 mts. The sudden break in channel gradient at the edge of Ranchi plateau gives rise to the rejuvenating knick point.');

INSERT INTO details (package_name,place_title,description) VALUES ('Jharkhand','Palamu','You may feel that Jharkhand is just a place of great flora and fauna but does it has any history to rely upon. Then let me tell you that the ruins of the Palamu Fort will satisfy your urge. This place was built during the time of 16th century stands in need of historical reverence.here are two ruined forts in the southeast of the city of Daltonganj. The first one (the old fort) is in the plains and the other one is on the hill (the new one) overlooking the meandering Auranga river popularly known as Oranga river in Palamu. The river has a jagged structure due to the highly exposed bed of the river, from where Palamu derives its name “place of the fanged river”.');

INSERT INTO details (package_name,place_title,description) VALUES ('Jharkhand','Teracotta Temples of Maluti','Built between 17th and 19th century, 72 extant terracotta temples (originally 108) located in Maluti village near Shikharipara, Dumka, gives you the essence of the creative minds of the ancestors of Jharkhand. This place promises a meta-knowledge with its profound intricate description of terracotta culture. The engravings on the walls of the temple and its terracotta idols enwombs a stunning aesthetics and an unknown spirituality.');

INSERT INTO details (package_name,place_title,description) VALUES ('Jharkhand','Shikharji : Parasnath Hill','The highest range hill on the Jharkhand’s highest point Parasnath, Shikharji, “ The Venerable Peak” is known for its spirituality. It is one of the most important pilgrimage site for Jains. There exists a belief that twenty of the twenty-four Tirhtkaras and few monks got salvation on this hill. Therefore also known as Sammet Sikhar or the peak of concentration.Here the visitor can find a lot of temples which has its own simplistic endevour and is auspicious with its authenticity of the structure. The replica of the temple is present at Dadabari, New Delhi. The hill also has a rare breed of species of wild life, like Mahua, Shimul Palash. Lots of ariel species will also attract your attention.These hills lie in the Giridih District, which literally means “Land of Hills” has many other attached beautiful visiting site- Usri Fall, Madhuban, Jain Museum, Khandoli park, and Jharkhandi Dham.');

INSERT INTO details (package_name,place_title,description) VALUES ('Jharkhand','Trikut Pahar','An exciting destination for trekking and ride ropeway, Trikut Pahar or hill gives a safe natural retreat to the visitor. It has its religious importance with the most famous temples being- Trikutachal Mahadev Temple, Bhagwati Temple, Sage Dayananda Hermitage, and Sage Bam Baba Temple.Tirkut Pahar has a famous Stream of cool and fresh water on the hill top. Tirkut Pahar is also known as the “Garden of Lord Shiva” as there are woods which are offered to make him happy. The strange wildlife implores a tremendous adventurous soul.');

INSERT INTO details (package_name,place_title,description) VALUES ('Jharkhand','Jonha Falls','The Johna Falls also known as Gautamdhara Falls is a popular waterfall situated at 40 km from Ranchi. This waterfall lies at the edge of Ranchi Plateau and comes amongst the hanging valley falls. It gathers water supply from River Ganga and Raru to form the fall. It drops water from a height of 43 m. To see the surrounding areas of this falls,  a decent of 500 stairs is required.The premise of this waterfall also includes a rest house, which encloses a Buddhist shrine, dedicated to Lord Gautam Buddha. There is also a nearby temple and ashram dedicated to Lord Buddha, situated on the Gautam Pahar.');

/********************************Andhra Pradesh******************************************/

INSERT INTO details (package_name,place_title,description) VALUES ('Andhra Pradesh','Lambasingi','Lambasingi is a tiny village nestled in the Eastern Ghats. One of the exclusive features of the location is its chilly temperature experienced even during summer. This place is often referred to as the ‘Kashmir of Andhra Pradesh’. Snow fall which can barely be seen in south India can also be witnessed in this place as temperatures go higher than 10-degree centigrade and always close up to Zero degree centigrade.');

INSERT INTO details (package_name,place_title,description) VALUES ('Andhra Pradesh','Yaganti','Yaganti in Kurnool District of Andhra Pradesh is renowned for Uma Maheshwara Temple of Lord Shiva. The temple dates back to 5th and 6th centuries with contributions spanning thousands of years from the Pallavas, Cholas, Chalukyas and Vijayanagara dynasties. The temple received important contributions from Vijayanagara Kings Harihara and Bukka Rayalu, who ended the construction of several structures in and around the temple.');

INSERT INTO details (package_name,place_title,description) VALUES ('Andhra Pradesh','Lepakshi','Lepakshi is a small hamlet in the Anantpur district of Andhra Pradesh, which is just over 120 km from Bangalore and 15 km from the town of Hindpur making it an easy day trip from Bangalore. The place is renowned in south India for three temples that are devoted to Lord Shiva and Lord Vishnu. One of the other prominent attractions of the place is a huge Nandi bull made out of a monolithic rock.');

INSERT INTO details (package_name,place_title,description) VALUES ('Andhra Pradesh','Gandikota','Gandikota is a village in Kadapa district of Andhra Pradesh, known for its fort which lies near the canyon formed by river Pennar with the Erramala hills. Recently it has become more famous for the canyon and has begun to be referred to as ‘Grand Canyon of India’. The entrance to the fort has a granary used to store food during droughts by the Nayakas. There are two temples and one masjid inside the fort complex. The fort complex also has gorgeous gardens. The other structures within the fort, include big granary, an elegant ‘Pigeon Tower’ with windows and a palace built using decorated bricks. There is also the ‘Rayalacheruvu’ with its permanent springs and believed to be connected to a fountain in Jamia Masjid through pipes.');

INSERT INTO details (package_name,place_title,description) VALUES ('Andhra Pradesh','Orvakal Rock Garden','Orvakal Rock Garden is a wonderful site with profuse natural beauty of rock formations. It is located just 3 KMs from Orvakal village. Orvakal Rock Garden is an exceptional silica and quartz rock formation place with beautiful surroundings. The rocks are fashioned around a natural lake in the middle of the site that increases the exquisiteness of the place. This is one of the must visit places around Kurnool.');

INSERT INTO details (package_name,place_title,description) VALUES ('Andhra Pradesh','Papi Kondalu','Papi Kondalu is a stunning mountain range situated in Andhra Pradesh. It is an element of the Eastern Ghats; Located along the Godavari River. This mountain range is enclosed with tropical and deciduous rain forests that offer views of the surroundings. For exploring the places, tourists have to cover a boat journey either from Bhadrachalam or Rajahmundry, which is the main doorway to the area. Locals engage in various activities such as fishing, agriculture and handicraft making.');

/*********************************Lakshadweep_start***************************/

INSERT INTO details (package_name,place_title,description) VALUES ('Lakshadweep','Minicoy Island','One of the 36 small islets of Lakshadweep group of Islands, Minicoy, also known as Maliku in the local language is one of the best-kept secrets of India. It is located amidst the vast expanse of Arabian Sea, just 398 km or 215 nautical miles from the shores of Cochin. The small island encompasses the total area of 4.801 sq. km and is exclusively known for its vibrant coral reefs, quaint white-sand beaches and the fresh water of the infinite ocean.The Minicoy Island is the second largest Island of the Lakshadweep and is one of the few inhabited islands of the group. It is best known for its luxury beach resorts that are an ideal destination for the travellers seeking tranquillity.');

INSERT INTO details (package_name,place_title,description) VALUES ('Lakshadweep','Agatti Islands','Agatti Islands is considered another jewel from the Lakshadweep group of islands in India. It is majorly known for its blissful beauty of coral reefs but the scenic beauty of the island is mesmerizing too. The island is situated on one of the coral isles of Lakshadweep islands and is few of the islands from the Lakshadweep group that is inhabited by people. Tourists often travel to Agatti Islands to bask in the sun, the white sand with crystal clear water under clear blue skies. With a total area of a little over 3 square kilometres, the island may be small compared to many other islands but it is nothing but a sheer paradise for beach lovers and offbeat travellers.');

INSERT INTO details (package_name,place_title,description) VALUES ('Lakshadweep','Banagram Island','Banagram Island, a breathtaking island located in the clear blue waters of the Indian Ocean, is a beautiful tiny island in the Union Territory of Lakshadweep, India. The pristine beaches and vibrant coral reefs are a treat for travellers. Walk around the entire island, swim with the colourful fishes, watch how the sting rays sway, check out the dolphins as they move closer to become friends with you, notice the turtles move leisurely either on the beach or under water and observe the bright colours of the coral reefs around. It\'s an experience never to be missed. This enchanting island is also known as Bunnagara in the local language and is considered as one of the least explored parts of  Lakshadweep Islands.');

INSERT INTO details (package_name,place_title,description) VALUES ('Lakshadweep','Kalpeni Island','Also known as Koefaini, Kalpeni islands is a group of three islands and is one of the most picturesque areas of Lakshadweep. Cheriyam, Pitti and Tillakkam are the islands which together forms the Kalpeni islands.These islands are inhabited and are frequently visited by tourists. Kalpeni is famous for its beautiful lagoon surrounding the island and is highly rich in Coral life. Naturally, this place is among the must-see places in Lakshadweep. This is also a great spot to enjoy water sports including Scuba Diving, Snorkeling, Reef walking, canoeing, kayaking and sailing yachts.');

INSERT INTO details (package_name,place_title,description) VALUES ('Lakshadweep','Kavaratti Islands','Kavaratti Island is one of the most beautiful gems from the Lakshadweep group of islands. The capital of Lakshadweep it is yet another island famous for its splendid sea views and the pristine white-sand beaches. Kavaratti lies 360 km from the shores of Kochi. It doesn\'t have its airport and Agatti is the nearest airport to the island. Under the mission to develop smart cities, Kavaratti has been chosen to be developed into a smart city in the years to come.Kavaratti is a small island spread across an area of 3.93 sqm km, but there is no dearth of natural beauty at the islands. The island is a home to 12 atolls, five submerged banks, and three coral reefs. The spectacular views of the Arabian sea, the sparkling white-sand beaches offers solace amidst the tranquil nature.');

INSERT INTO details (package_name,place_title,description) VALUES ('Lakshadweep','Kadmat Island','Sprawling over 9.3 kms in length, Kadmat Island is a gorgeous island which is part of the Amindivi subgroup of islands in the Lakshadweep archipelago. Boasting of silvery white beaches, sunkissed shores, wonderful blue lagoons, azure blue waters, and vibrant coral reefs, Kadmat Island is a travellers\' delight.The picturesque island is infested with marine turtles which live and breed here. Other than that, the island just has one inhabited village called Kadmat where fishing is the major occupation. Kadmat Island offers a host of activities to its guests which is why it is thronged by thousands of tourists every year. Some of the most popular activities and things to do on the island are scuba diving, kayaking, snorkelling and paragliding.');

INSERT INTO details (package_name,place_title,description) VALUES ('Lakshadweep','Andretti Island','Also known as Andrott Island, this is the largest island of Lakshadweep and is located closest to the Indian mainland. Unlike other islands, Andretti islands are in east-west direction.The island is also inhabited, but has been able to maintain its beauty and charm. It also provides enough opportunities to its visitors to mingle with the nature. Spending the evenings at the seaside could be very relaxing and if you are lucky enough, you might be able to spot various aquatic animals including octopuses. Andretti Island is also famous for some Buddhist archaeological remains and the tomb of Saint Hazrat Ubaidullah. However, foreign tourists are not allowed to visit this island.');

/************************************************************************************************************************/





