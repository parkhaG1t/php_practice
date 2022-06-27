/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - applebooks
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`applebooks` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `applebooks`;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `imgname` varchar(100) NOT NULL,
  `intro` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`title`,`author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `books` */

insert  into `books`(`title`,`author`,`price`,`imgname`,`intro`) values 
('The Brain','데이비드 이글먼',16000,'The Brain_데이비드 이글먼.jpeg','우리는 세계를 파악할 때 뇌에 의지한다. 뇌는 우리의 결정들이 발생하는 장소이자, 상상이 제작되는 곳이다. 우리의 꿈과 깨어 있는 삶은 무수한 뇌 세포들의 활동에서 비롯된다. 저명한 신경과학자 데이비드 이글먼의 『더 브레인』은 매우 쉽고 친절한 뇌과학 책으로, 우리가 누구인지, 어떻게 실재를 지각하는지, 우리가 어떻게 결정을 내리는지, 우리의 삶이 어떻게 조종되는지, 왜 우리는 타인들을 필요로 하는지 등을 대중의 눈높이에 맞춰 소개해준다. PBS(미국공영방송)와 BBC(영국공영방송)에서 방영된 화제의 방송 『데이비드 이글먼의 더 브레인(The Brain with David Eagleman)』(6부작)의 핵심 내용을 책으로 풀어 쓴 것이다.'),
('돈의 속성','김승호',17800,'돈의 속성_김승호.jpeg','이 책은 초판 발행 후, 경제경영 필도서로 자리매김한 『돈의 속성』 200쇄 기념 개정증보판이다. 200쇄에 맞춰 코로나19로 바뀐 경제상황과 돈에 관한 김승호 회장의 추가 메시지를 담았다. 『돈의 속성』은 3년 전 어느 극장 하나를 빌려 대중에게 강의했던 내용을 기반으로 집필됐다. 강연은 방송을 통해 전파되며 유튜브와 셀럽들에 의해 공유와 전파를 거듭했다. 그리고 이내 1,100만 명에게 전달되기에 이르렀다. 하지만 여러 사람을 통해 생산 및 재생산되는 과정에서 어떤 의미는 그 뜻이 정확히 전달되지 않았거나 의미가 왜곡되는 일이 있었다. 몇 권을 저술한 저자지만 여전히 책 쓰기가 가장 어렵다는 그는 이런 상황에서 다시 한 번 펜을 잡기로 결정했다. 그것은 그의 내면에 깃든 사람에 대한 애정 때문이었다. 모두에게 정말 필요하고 중요하지만 아무도 말하지 않는 진짜 돈 버는 방법, 진짜 돈을 벌어본 사람은 그 누구도 방법을 공유하지 않기에 이 일이 저자 자신에게 주어진 것이라 받아들였다. 젊은 날의 자신의 모습이 투영되기에. 어떤 횡재나 일명 대박주식 없이 말 그대로 맨손에서 만들어낸 종잣돈으로 돈 버는 방법을 알려준다. 부모에게 받은 유산은커녕, 30대 후반까지 낡은 자동차에 그날 판매할 과일을 싣고 다니던 어느 가난한 이민 가장이 이룬 진짜 부에 대한 모든 방법이 담겼다. 종잣돈 천만 원을 만들고 그 돈을 1억 원, 10억 원, 100억 원, 수천억 원이 될 때까지 돈을 관리하며 터득한 ‘돈’이 가진 속성을 정리한 안내서다. ‘진짜 부자’가 된 실제 인물이 말해주는 ‘진짜 돈’만들기에 대한 책이다. 돈이 가진 속성과 75가지 돈에 대한 가르침을 통해 현재 200만 원을 벌고 있는 직장인, 마이너스 생활 중인 누군가, 직장이 없는 청년, 가용자금이 있고 투자처를 찾고 있는 사람이나 그 너머까지 돈을 운용할 수 있는 재력가와 투자가, 사업가 또는 ‘우리 아이들에게만큼은 더 이상 가난을 물려줄 수 없다’는 부모…, 그 누구라도 자신에게 꼭 필요한 조언을 찾을 수 있'),
('송해 1927','송해, 이기남',15800,'송해 1927_송해, 이기남.jpeg','최고령 현역 연예인 송해의 진솔한 인생사! 열린책들의 새로운 브랜드 〈사람의집〉의 첫 출간작인 『송해 1927』은 다큐멘터리 영화 「송해 1927」을 촬영하면서 송해가 들려주는 인생 이야기를 꾸밈없이 담은 책이다. 여러 번으로 나눠서 진행된 송해와의 인터뷰를 비롯하여 그의 가족과 희극인 후배들 그리고 「전국노래자랑」의 악단장이 말하는 송해에 관한 숨은 이야기도 기록하였다. 속 깊은 인터뷰에는 송해가 평생 안으로 삼켜 온 슬픔과 응어리도 함께 들어가 있어 읽는 사람을 애타게 만들고 또 때로는 감동을 주기도 한다. 무엇보다 『송해 1927』은 영광과 눈물이 함께한 송해의 아흔다섯 해에 이르는 드라마를 그의 육성으로 기록한 책이다. 그는 분단 70년의 역사가 몸에 그대로 새겨져 있는 한국 현대사의 산증인이자 파란만장한 대중문화의 발전사가 얼굴에 그려져 있는 한국 예술계의 대들보이다. 유랑 극단을 따라 전국을 떠돌며 청춘을 바친 그는 라디오와 TV 방송의 시대가 열리며 본격적인 연예인의 길을 걷는다. 그리고 세 살 아이부터 백 살 노인까지 누구나 무대에 올라 노래를 자유롭게 부를 수 있는 「전국노래자랑」을 35년간 도맡아 서민들의 축제로 만들어 왔다. 하지만 송해의 삶은 영광의 이면에 눈물이, 신명의 이면에 고독이 함께하는 굴곡의 인생이었다. 「전국노래자랑」을 통해 가장 친근한 연예인으로 우리 곁을 지키고 있지만 그 이면에는 6.25 전쟁의 실향민이라는 아픔과 딴따라 연예인의 굴곡진 삶 그리고 오래전 잃어버린 아들을 품에 안고 살아온 슬픔도 함께 간직하고 있다.'),
('아노말리','에르베 르 텔리에',18000,'아노말리_에르베 르 텔리에.jpeg','2020년 공쿠르상 수상작 공쿠르 수상작 중 가장 많은 화제와 판매를 기록한 놀라운 작품! 파리-뉴욕 간 여객기가 석 달이라는 시간 차를 두고 도플갱어처럼 똑같은 사람들을 싣고 동일 지점에서 난기류를 겪은 전대미문의 사건을 그린 2020년 공쿠르상 수상작 『아노말리』가 민음사에서 출간되었다. ‘아노말리’는 ‘이상’, ‘변칙’이라는 뜻으로, 주로 기상학이나 데이터 과학에서 ‘이상 현상’, ‘차이 값’이라는 의미로 쓰인다. 『아노말리』는 예년처럼 11월 첫 주 파리 드루앙 레스토랑에서 공쿠르상 수상작으로 발표되지 못했다. 코비드19로 인한 록다운 때문에 영업이 불가해진 동네 서점들에 연대하는 뜻으로 발표가 유예된 것이다. 공쿠르상은 상금이 10유로밖에 안 되지만 수상작이 되면 날개 돋친 듯이 팔리기 때문에, 공쿠르 시즌은 프랑스 서점가의 대목이다. 에르베 르 텔리에는 예년보다 석 주 늦게, 거리 두기 방침에 따라 온라인 줌으로 수상자의 영예를 안았다. 1991년부터 단편, 장편, 희곡, 시 등 장르를 넘나들며 작품을 쓰고, 수학자, 언어학자, 과학 기자, 만평가, 라디오 프로그램 고정 출연자 등 다방면으로 활동해 온 작가의 여덟 번째 장편소설에 주어진 상이었다.  에르베 르 텔리에는 레몽 크노, 조르주 페렉, 이탈로 칼비노 등 세계적 작가들과 마르셀 뒤샹 같은 예술가들도 함께한 실험적인 문학 창작 집단인 ‘울리포(잠재 문학 작업실)’의 회원이자 2019년부터는 모임의 회장직을 맡고 있기도 한데, 『아노말리』는 울리포 작가로는 처음 공쿠르상을 탄 작품이자 르 텔리에가 울리포에 바치는 오마주 같은 작품이기도 하다. 그러나 『아노말리』는 울리포 특유의 난해함이 장벽으로 작용하지 않는 소설이다. 청부 살인 업자, 소설가, 나이지리아 뮤지션, 어린 미국인 소녀, 비행기 기장, 미국인 변호사, 노년으로 접어든 건축 설계사와 그의 연인인 젊은 영화 편집인 등 접점이 없는 이들의 이야기가 제각기 펼쳐지다가 전대미문의 SF적 상황을 통해 인간 실존이라는 주제를 대면하는 과정이 마'),
('언어의 온도','이기주',13800,'언어의 온도_이기주.jpeg','말과 글에는 나름의 온도가 있다. 언어에는 따뜻함과 차가움, 적당한 온기 등 나름의 온도가 있다. 세상살이에 지칠 때 어떤 이는 친구와 이야기를 주고받으며 고민을 털기도 하고, 어떤 이는 책을 읽으며 작가가 건네는 문장으로 위안을 얻는다. 이렇듯 ‘언어’는 한순간 나의 마음을 꽁꽁 얼리기도, 그 꽁꽁 얼어붙었던 마음을 녹여주기도 한다.  『언어의 온도』의 저자 이기주는 엿듣고 기록하는 일을 즐겨 하는 사람이다. 그는 버스나 지하철에 몸을 실으면 몹쓸 버릇이 발동한다고 고백한다. 이 책은 저자가 일상에서 발견한 의미 있는 말과 글, 단어의 어원과 유래, 그런 언어가 지닌 소중함과 절실함을 농밀하게 담아낸 것이다.'),
('한 컷 한국사','조한경 , 김남수 , 김민수 , 김종민 , 박범희 , 박상필 , 박중현 , 백형대 정연두 , 차경호',20000,'한 컷 한국사_조한경 , 김남수 , 김민수 , 김종민 , 박범희 , 박상필 , 박중현 , 백형대 정연두 , 차경호.jpeg','역사 교사들이 한 컷의 사진으로 풀어낸 살아있는 한국사 이야기 『한 컷 한국사』를 집필한 열 명의 역사 교사들은 고등학교 한국사 교과서를 공동 집필한 경험이 있다. 집필진은 한 컷의 역사 사진에 담겨 있는 시대상을 역사 교사의 시선으로 풀어쓴 책이 있으면 좋겠다는 데 의견을 모은 뒤, 145컷의 한국사 사진을 선정하고 2년의 공부와 집필을 거쳐 『한 컷 한국사』를 완성했다. 역사 교사들이 치열한 논쟁 끝에 사진을 선정한 기준을 따라가 보자. 필자들은 과거와 현재를 연결하는 역사적 소재(마천루 속 석촌동 고분, 퇴색하지 않은 백제의 랜드마크 / 시대를 뛰어넘어 만난 두 체공녀, 강주룡과 김진숙), 역사적 사건을 생생하게 보여 주는 사진이지만 숨어 있는 의도성(담뱃대를 든 조선인이 맥주병을 안은 사연은? / 누가 야만인가? 광성보 전투)에 관심을 가졌다. 또한 역사의 수레바퀴에 눌려 제 목소리를 내지 못하고 사라져 간 사람들의 이야기(‘손가락 총’에 죽어 나간 사람들, 여수ㆍ순천 10ㆍ19 사건 / ‘골’로 간 사람들), 같은 사건일지라도 이전과는 다른 시각으로 살펴보기(밥이 하늘이다, 동학 농민군이 꿈꾼 세상), 기존에 접하지 못했거나 접했어도 잊힌 사건을 재조명한 소재(벌거벗은 임금님, 태조 왕건 청동상의 사연 / 파묻고 싶었던 굴욕, 삼전도비 / 한국 정치에 돌풍을 일으키다, 40대 기수론)가 선정의 기준이 되었다. 진흙에 반쯤 잠긴 백제 금동 대향로 사진에서 발굴 당시의 상황을, 서대문 형무소에서 카메라를 응시하는 김재봉의 눈빛에서는 독립운동가들의 의지를 읽어낼 수 있다. 사진을 단서로 필자들의 해설을 따라 읽다 보면 독자들은 추리 소설처럼 재미있는 역사를 만날 수 있을 것이다.');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `qty` int(10) DEFAULT 1,
  PRIMARY KEY (`id`,`title`,`author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cart` */

/*Table structure for table `ord` */

DROP TABLE IF EXISTS `ord`;

CREATE TABLE `ord` (
  `ordernum` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `id` varchar(20) NOT NULL,
  `price` int(10) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `loc` varchar(50) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`ordernum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ord` */

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `score` int(1) NOT NULL,
  `review` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`,`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `review` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `email` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `loc` varchar(50) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  PRIMARY KEY (`email`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`email`,`id`,`pwd`,`name`,`phone`,`loc`,`birth`) values 
('','admin','admin','admin','',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
