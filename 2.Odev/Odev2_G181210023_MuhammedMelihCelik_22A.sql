--
-- PostgreSQL database dump
--

-- Dumped from database version 12.0
-- Dumped by pg_dump version 12rc1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: vtysodev2; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE vtysodev2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Turkish_Turkey.1254' LC_CTYPE = 'Turkish_Turkey.1254';


ALTER DATABASE vtysodev2 OWNER TO postgres;

\connect vtysodev2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: Rozetler; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Rozetler" (
    "Id" integer NOT NULL,
    "KullaniciId" integer,
    "RozetIsmi" character varying(30) NOT NULL,
    "RozetSinifi" character varying(30),
    "VerilmeSayisi" integer,
    "VerilmeTarihi" date
);


ALTER TABLE public."Rozetler" OWNER TO postgres;

--
-- Name: AltinRozet; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."AltinRozet" (
    "RozetId" integer NOT NULL,
    "AltinRozetGereksinim" character varying(255)
)
INHERITS (public."Rozetler");


ALTER TABLE public."AltinRozet" OWNER TO postgres;

--
-- Name: AsagiOy; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."AsagiOy" (
    "OyTipiId" integer NOT NULL,
    "ItibarEksi" integer
);


ALTER TABLE public."AsagiOy" OWNER TO postgres;

--
-- Name: BronzRozet; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."BronzRozet" (
    "RozetId" integer NOT NULL,
    "BronzRozetGereksinim" character varying(255)
)
INHERITS (public."Rozetler");


ALTER TABLE public."BronzRozet" OWNER TO postgres;

--
-- Name: Kullanicilar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Kullanicilar" (
    "Id" integer NOT NULL,
    "KullaniciIsim" character varying(30) NOT NULL,
    "KullaniciOlmaTarihi" date DEFAULT '2019-12-08'::date,
    "KullaniciSiteBaglantisi" character varying(50),
    "KullaniciProfilResmiBaglantisi" character varying(50),
    "SonGorulme" date DEFAULT '2019-12-08'::date,
    "ProfilGoruntulenmesi" integer,
    "HakkindaGovdesi" character varying(255),
    "Yas" integer,
    "ItibarSayisi" integer,
    "ZiyaretEdilmeSayisi" integer,
    "SoruSayisi" integer
);


ALTER TABLE public."Kullanicilar" OWNER TO postgres;

--
-- Name: Editor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Editor" (
    "KullaniciId" integer NOT NULL,
    "DuzenlenmisSorular" character varying(500),
    "DuzenlenmisYanitlar" character varying(500),
    "DuzenlenmisEtiketler" character varying(100)
)
INHERITS (public."Kullanicilar");


ALTER TABLE public."Editor" OWNER TO postgres;

--
-- Name: Etiketler; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Etiketler" (
    "Id" integer,
    "EtiketIsmi" character varying(50),
    "EtiketSinifi" character varying(50),
    "EtiketSayisi" integer,
    "EtiketBilgisi" character varying(255)
);


ALTER TABLE public."Etiketler" OWNER TO postgres;

--
-- Name: Filtre; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Filtre" (
    "Id" integer,
    "EtiketTipi" character varying(50),
    "SiralamaTipi" character varying(50),
    "İcerikBenzerligiYazi" character varying(500)
);


ALTER TABLE public."Filtre" OWNER TO postgres;

--
-- Name: GumusRozet; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."GumusRozet" (
    "RozetId" integer NOT NULL,
    "GumusRozetGereksinim" character varying(255)
)
INHERITS (public."Rozetler");


ALTER TABLE public."GumusRozet" OWNER TO postgres;

--
-- Name: OyTipi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."OyTipi" (
    "Id" integer NOT NULL,
    "OyId" integer,
    "OyIsmi" character varying(15)
);


ALTER TABLE public."OyTipi" OWNER TO postgres;

--
-- Name: Oylar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Oylar" (
    "Id" integer NOT NULL,
    "SoruId" integer,
    "KullaniciId" integer,
    "OylanmaZamani" date
);


ALTER TABLE public."Oylar" OWNER TO postgres;

--
-- Name: SoruEtiketleri; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."SoruEtiketleri" (
    "SoruId" integer,
    "EtiketId" integer
);


ALTER TABLE public."SoruEtiketleri" OWNER TO postgres;

--
-- Name: SoruGecmisTipi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."SoruGecmisTipi" (
    "Id" integer NOT NULL,
    "Isim" character varying(50)
);


ALTER TABLE public."SoruGecmisTipi" OWNER TO postgres;

--
-- Name: SoruGecmisi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."SoruGecmisi" (
    "Id" integer NOT NULL,
    "SoruSahibiId" integer,
    "SorulmaTarihi" date,
    "SoruId" integer,
    "SoruGecmisTipiId" integer,
    "Gecmisİcerik" character varying(500),
    "GoruntulenmeSayisi" integer
);


ALTER TABLE public."SoruGecmisi" OWNER TO postgres;

--
-- Name: SoruGeriBildirimleri; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."SoruGeriBildirimleri" (
    "Id" integer NOT NULL,
    "SoruId" integer,
    "OyTipiId" integer,
    "BildirimOlusturmaZamani" date,
    "AnonimGeriBildirim" character varying(255)
);


ALTER TABLE public."SoruGeriBildirimleri" OWNER TO postgres;

--
-- Name: Sorular; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Sorular" (
    "Id" integer NOT NULL,
    "EtiketId" integer,
    "SoruSahibiId" integer,
    "SoruBasligi" character varying(100),
    "SoruGovdesi" character varying(500),
    "YorumSayisi" integer,
    "GoruntulenmeSayisi" integer,
    "OylanmaSayisi" integer,
    "FiltreId" integer,
    "SonAktiflikTarihi" date,
    "SonDuzenlenmeTarihi" date,
    "FavoriSayisi" integer,
    "OlusturmaTarihi" date
);


ALTER TABLE public."Sorular" OWNER TO postgres;

--
-- Name: Yanitlar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Yanitlar" (
    "Id" integer NOT NULL,
    "OyId" integer,
    "SoruId" integer,
    "KullaniciId" integer,
    "YanitGovdesi" character varying(500),
    "YanitlanmaZamani" date
);


ALTER TABLE public."Yanitlar" OWNER TO postgres;

--
-- Name: Yonetici; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Yonetici" (
    "KullaniciId" integer NOT NULL,
    "TumSistemYetkisi" boolean
)
INHERITS (public."Kullanicilar");


ALTER TABLE public."Yonetici" OWNER TO postgres;

--
-- Name: YukariOy; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."YukariOy" (
    "OyTipiId" integer NOT NULL,
    "ItibarArti" integer
);


ALTER TABLE public."YukariOy" OWNER TO postgres;

--
-- Name: Editor KullaniciOlmaTarihi; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Editor" ALTER COLUMN "KullaniciOlmaTarihi" SET DEFAULT '2019-12-08'::date;


--
-- Name: Editor SonGorulme; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Editor" ALTER COLUMN "SonGorulme" SET DEFAULT '2019-12-08'::date;


--
-- Name: Yonetici KullaniciOlmaTarihi; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yonetici" ALTER COLUMN "KullaniciOlmaTarihi" SET DEFAULT '2019-12-08'::date;


--
-- Name: Yonetici SonGorulme; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yonetici" ALTER COLUMN "SonGorulme" SET DEFAULT '2019-12-08'::date;


--
-- Data for Name: AltinRozet; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."AltinRozet" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi", "RozetId", "AltinRozetGereksinim") VALUES (1, 1, 'SoruAvcisi', 'AltinRozet', 1, '2019-12-08', 1, 'Kullanici 3 soru cevaplamistir');
INSERT INTO public."AltinRozet" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi", "RozetId", "AltinRozetGereksinim") VALUES (2, 2, 'SoruAvcisi', 'AltinRozet', 1, '2019-12-08', 4, 'Kullanici 3 soru cevaplamistir');


--
-- Data for Name: AsagiOy; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."AsagiOy" ("OyTipiId", "ItibarEksi") VALUES (1, 5);
INSERT INTO public."AsagiOy" ("OyTipiId", "ItibarEksi") VALUES (2, 5);
INSERT INTO public."AsagiOy" ("OyTipiId", "ItibarEksi") VALUES (3, 5);


--
-- Data for Name: BronzRozet; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."BronzRozet" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi", "RozetId", "BronzRozetGereksinim") VALUES (1, 1, 'YeniUye', 'BronzRozet', 1, '2019-12-08', 3, 'Bir konu acmistir');
INSERT INTO public."BronzRozet" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi", "RozetId", "BronzRozetGereksinim") VALUES (2, 2, 'YeniUye', 'BronzRozet', 1, '2019-12-08', 6, 'Bir konu acmistir');


--
-- Data for Name: Editor; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Editor" ("Id", "KullaniciIsim", "KullaniciOlmaTarihi", "KullaniciSiteBaglantisi", "KullaniciProfilResmiBaglantisi", "SonGorulme", "ProfilGoruntulenmesi", "HakkindaGovdesi", "Yas", "ItibarSayisi", "ZiyaretEdilmeSayisi", "SoruSayisi", "KullaniciId", "DuzenlenmisSorular", "DuzenlenmisYanitlar", "DuzenlenmisEtiketler") VALUES (1, 'Melih', '2019-07-08', 'https://sabis.sakarya.edu.tr/', 'https://sabis.sakarya.edu.tr/', '2019-12-08', 7, 'Merhaba benim adım Melih!', 20, 5, 12, 3, 1, NULL, NULL, NULL);
INSERT INTO public."Editor" ("Id", "KullaniciIsim", "KullaniciOlmaTarihi", "KullaniciSiteBaglantisi", "KullaniciProfilResmiBaglantisi", "SonGorulme", "ProfilGoruntulenmesi", "HakkindaGovdesi", "Yas", "ItibarSayisi", "ZiyaretEdilmeSayisi", "SoruSayisi", "KullaniciId", "DuzenlenmisSorular", "DuzenlenmisYanitlar", "DuzenlenmisEtiketler") VALUES (2, 'Muhammed', '2019-07-08', 'https://sabis.sakarya.edu.tr/', 'https://sabis.sakarya.edu.tr/', '2019-12-08', 15, 'Merhaba benim adım Muhammed!', 20, 7, 17, 4, 2, NULL, NULL, NULL);


--
-- Data for Name: Etiketler; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Etiketler" ("Id", "EtiketIsmi", "EtiketSinifi", "EtiketSayisi", "EtiketBilgisi") VALUES (1, 'android', 'mobil', 1, 'Android ile ilgili konular.');
INSERT INTO public."Etiketler" ("Id", "EtiketIsmi", "EtiketSinifi", "EtiketSayisi", "EtiketBilgisi") VALUES (2, 'google', 'internet', 1, 'Google ile ilgili konular.');
INSERT INTO public."Etiketler" ("Id", "EtiketIsmi", "EtiketSinifi", "EtiketSayisi", "EtiketBilgisi") VALUES (3, 'windows', 'işletim sistemi', 1, 'Windows ile ilgili konular.');
INSERT INTO public."Etiketler" ("Id", "EtiketIsmi", "EtiketSinifi", "EtiketSayisi", "EtiketBilgisi") VALUES (4, 'php', 'yazılım dili', 1, 'Php ile ilgili konular.');
INSERT INTO public."Etiketler" ("Id", "EtiketIsmi", "EtiketSinifi", "EtiketSayisi", "EtiketBilgisi") VALUES (5, 'nodejs', 'yazılım dili', 1, 'NodeJs ile ilgili konular.');
INSERT INTO public."Etiketler" ("Id", "EtiketIsmi", "EtiketSinifi", "EtiketSayisi", "EtiketBilgisi") VALUES (6, 'klavye', 'donanım', 1, 'Klavye ile ilgili konular.');


--
-- Data for Name: Filtre; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Filtre" ("Id", "EtiketTipi", "SiralamaTipi", "İcerikBenzerligiYazi") VALUES (1, 'android', 'yeni', 'İçerik benzerliği bulunamadı.');
INSERT INTO public."Filtre" ("Id", "EtiketTipi", "SiralamaTipi", "İcerikBenzerligiYazi") VALUES (2, 'google', 'yeni', 'İçerik benzerliği bulunamadı.');
INSERT INTO public."Filtre" ("Id", "EtiketTipi", "SiralamaTipi", "İcerikBenzerligiYazi") VALUES (3, 'windows ', 'yeni', 'İçerik benzerliği bulunamadı.');
INSERT INTO public."Filtre" ("Id", "EtiketTipi", "SiralamaTipi", "İcerikBenzerligiYazi") VALUES (4, 'php', 'yeni ', 'İçerik benzerliği bulunamadı.');
INSERT INTO public."Filtre" ("Id", "EtiketTipi", "SiralamaTipi", "İcerikBenzerligiYazi") VALUES (5, 'nodejs', 'yeni', 'İçerik benzerliği bulunamadı.');
INSERT INTO public."Filtre" ("Id", "EtiketTipi", "SiralamaTipi", "İcerikBenzerligiYazi") VALUES (6, 'klavye', 'yeni', 'İçerik benzerliği bulunamadı.');


--
-- Data for Name: GumusRozet; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."GumusRozet" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi", "RozetId", "GumusRozetGereksinim") VALUES (1, 1, 'Merakli', 'GumusRozet', 1, '2019-12-08', 2, 'Kullanici 3 soru sormustur');
INSERT INTO public."GumusRozet" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi", "RozetId", "GumusRozetGereksinim") VALUES (2, 2, 'Merakli', 'GumusRozet', 1, '2019-12-08', 5, 'Kullanici 3 soru sormustur');


--
-- Data for Name: Kullanicilar; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Kullanicilar" ("Id", "KullaniciIsim", "KullaniciOlmaTarihi", "KullaniciSiteBaglantisi", "KullaniciProfilResmiBaglantisi", "SonGorulme", "ProfilGoruntulenmesi", "HakkindaGovdesi", "Yas", "ItibarSayisi", "ZiyaretEdilmeSayisi", "SoruSayisi") VALUES (1, 'Melih', '2019-07-08', 'https://sabis.sakarya.edu.tr/', 'https://sabis.sakarya.edu.tr/', '2019-12-08', 7, 'Merhaba benim adım Melih!', 20, 5, 12, 3);
INSERT INTO public."Kullanicilar" ("Id", "KullaniciIsim", "KullaniciOlmaTarihi", "KullaniciSiteBaglantisi", "KullaniciProfilResmiBaglantisi", "SonGorulme", "ProfilGoruntulenmesi", "HakkindaGovdesi", "Yas", "ItibarSayisi", "ZiyaretEdilmeSayisi", "SoruSayisi") VALUES (2, 'Muhammed', '2019-07-08', 'https://sabis.sakarya.edu.tr/', 'https://sabis.sakarya.edu.tr/', '2019-12-08', 15, 'Merhaba benim adım Muhammed!', 20, 7, 17, 4);


--
-- Data for Name: OyTipi; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."OyTipi" ("Id", "OyId", "OyIsmi") VALUES (1, 1, 'AndroidOy');
INSERT INTO public."OyTipi" ("Id", "OyId", "OyIsmi") VALUES (2, 2, 'GoogleOy');
INSERT INTO public."OyTipi" ("Id", "OyId", "OyIsmi") VALUES (3, 3, 'WindowsOy');
INSERT INTO public."OyTipi" ("Id", "OyId", "OyIsmi") VALUES (4, 4, 'PhpOy');
INSERT INTO public."OyTipi" ("Id", "OyId", "OyIsmi") VALUES (5, 5, 'NodeJsOy');
INSERT INTO public."OyTipi" ("Id", "OyId", "OyIsmi") VALUES (6, 6, 'KlavyeOy');


--
-- Data for Name: Oylar; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Oylar" ("Id", "SoruId", "KullaniciId", "OylanmaZamani") VALUES (1, 1, 2, '2019-12-08');
INSERT INTO public."Oylar" ("Id", "SoruId", "KullaniciId", "OylanmaZamani") VALUES (2, 2, 1, '2019-12-08');
INSERT INTO public."Oylar" ("Id", "SoruId", "KullaniciId", "OylanmaZamani") VALUES (3, 3, 2, '2019-12-08');
INSERT INTO public."Oylar" ("Id", "SoruId", "KullaniciId", "OylanmaZamani") VALUES (4, 4, 1, '2019-12-08');
INSERT INTO public."Oylar" ("Id", "SoruId", "KullaniciId", "OylanmaZamani") VALUES (5, 5, 2, '2019-12-08');
INSERT INTO public."Oylar" ("Id", "SoruId", "KullaniciId", "OylanmaZamani") VALUES (6, 6, 1, '2019-12-08');


--
-- Data for Name: Rozetler; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Rozetler" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi") VALUES (1, 1, 'SoruAvcisi', 'AltinRozet', 1, '2019-12-08');
INSERT INTO public."Rozetler" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi") VALUES (2, 1, 'Merakli', 'GumusRozet', 1, '2019-12-08');
INSERT INTO public."Rozetler" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi") VALUES (3, 1, 'YeniUye', 'BronzRozet', 1, '2019-12-08');
INSERT INTO public."Rozetler" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi") VALUES (4, 2, 'SoruAvcisi', 'AltinRozet', 1, '2019-12-08');
INSERT INTO public."Rozetler" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi") VALUES (5, 2, 'Merakli', 'GumusRozet', 1, '2019-12-08');
INSERT INTO public."Rozetler" ("Id", "KullaniciId", "RozetIsmi", "RozetSinifi", "VerilmeSayisi", "VerilmeTarihi") VALUES (6, 2, 'YeniUye', 'BronzRozet', 1, '2019-12-08');


--
-- Data for Name: SoruEtiketleri; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."SoruEtiketleri" ("SoruId", "EtiketId") VALUES (1, 1);
INSERT INTO public."SoruEtiketleri" ("SoruId", "EtiketId") VALUES (2, 2);
INSERT INTO public."SoruEtiketleri" ("SoruId", "EtiketId") VALUES (3, 3);
INSERT INTO public."SoruEtiketleri" ("SoruId", "EtiketId") VALUES (4, 4);
INSERT INTO public."SoruEtiketleri" ("SoruId", "EtiketId") VALUES (5, 5);
INSERT INTO public."SoruEtiketleri" ("SoruId", "EtiketId") VALUES (6, 6);


--
-- Data for Name: SoruGecmisTipi; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."SoruGecmisTipi" ("Id", "Isim") VALUES (1, 'Yanıtlanan Soru.');
INSERT INTO public."SoruGecmisTipi" ("Id", "Isim") VALUES (2, 'Yanıtlanan Soru.');
INSERT INTO public."SoruGecmisTipi" ("Id", "Isim") VALUES (3, 'Yanıtlanan Soru.');
INSERT INTO public."SoruGecmisTipi" ("Id", "Isim") VALUES (4, 'Yanıtlanan Soru.');
INSERT INTO public."SoruGecmisTipi" ("Id", "Isim") VALUES (5, 'Yanıtlanan Soru.');
INSERT INTO public."SoruGecmisTipi" ("Id", "Isim") VALUES (6, 'Yanıtlanan Soru.');


--
-- Data for Name: SoruGecmisi; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."SoruGecmisi" ("Id", "SoruSahibiId", "SorulmaTarihi", "SoruId", "SoruGecmisTipiId", "Gecmisİcerik", "GoruntulenmeSayisi") VALUES (1, 1, '2019-12-08', 1, 1, 'Android cihazım sürekli ısınıyor neden olabilir', 2);
INSERT INTO public."SoruGecmisi" ("Id", "SoruSahibiId", "SorulmaTarihi", "SoruId", "SoruGecmisTipiId", "Gecmisİcerik", "GoruntulenmeSayisi") VALUES (2, 2, '2019-11-08', 2, 2, 'Google bende sertifika hatası veriyor neden', 3);
INSERT INTO public."SoruGecmisi" ("Id", "SoruSahibiId", "SorulmaTarihi", "SoruId", "SoruGecmisTipiId", "Gecmisİcerik", "GoruntulenmeSayisi") VALUES (3, 1, '2019-10-08', 3, 3, 'Windows 10 işletim sisteminde oyun modu çalışmıyor', 2);
INSERT INTO public."SoruGecmisi" ("Id", "SoruSahibiId", "SorulmaTarihi", "SoruId", "SoruGecmisTipiId", "Gecmisİcerik", "GoruntulenmeSayisi") VALUES (4, 2, '2019-09-08', 4, 4, 'Oturum tespit ataklarının önlenmesi dışında bir işe yarıyor mu', 4);
INSERT INTO public."SoruGecmisi" ("Id", "SoruSahibiId", "SorulmaTarihi", "SoruId", "SoruGecmisTipiId", "Gecmisİcerik", "GoruntulenmeSayisi") VALUES (5, 1, '2019-08-08', 5, 5, 'Sertifika veren 10.x sürümüne erişmeye çalışırken bilinmiyor', 2);
INSERT INTO public."SoruGecmisi" ("Id", "SoruSahibiId", "SorulmaTarihi", "SoruId", "SoruGecmisTipiId", "Gecmisİcerik", "GoruntulenmeSayisi") VALUES (6, 2, '2019-07-08', 6, 6, 'Klavyenin bağlantısını kestim ve terminalleri temizledikten sonra yeniden bağlandım.', 3);


--
-- Data for Name: SoruGeriBildirimleri; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."SoruGeriBildirimleri" ("Id", "SoruId", "OyTipiId", "BildirimOlusturmaZamani", "AnonimGeriBildirim") VALUES (1, 1, 1, '2019-12-08', 'Bir kullanıcı sorunuzu yanıtladı.');
INSERT INTO public."SoruGeriBildirimleri" ("Id", "SoruId", "OyTipiId", "BildirimOlusturmaZamani", "AnonimGeriBildirim") VALUES (2, 2, 2, '2019-12-08', 'Bir kullanıcı sorunuzu yanıtladı.');
INSERT INTO public."SoruGeriBildirimleri" ("Id", "SoruId", "OyTipiId", "BildirimOlusturmaZamani", "AnonimGeriBildirim") VALUES (4, 4, 4, '2019-12-08', 'Bir kullanıcı sorunuzu yanıtladı.');
INSERT INTO public."SoruGeriBildirimleri" ("Id", "SoruId", "OyTipiId", "BildirimOlusturmaZamani", "AnonimGeriBildirim") VALUES (3, 3, 3, '2019-12-08', 'Bir kullanıcı sorunuzu yanıtladı.');
INSERT INTO public."SoruGeriBildirimleri" ("Id", "SoruId", "OyTipiId", "BildirimOlusturmaZamani", "AnonimGeriBildirim") VALUES (5, 5, 5, '2019-12-08', 'Bir kullanıcı sorunuzu yanıtladı.');
INSERT INTO public."SoruGeriBildirimleri" ("Id", "SoruId", "OyTipiId", "BildirimOlusturmaZamani", "AnonimGeriBildirim") VALUES (6, 6, 6, '2019-12-08', 'Bir kullanıcı sorunuzu yanıtladı.');


--
-- Data for Name: Sorular; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Sorular" ("Id", "EtiketId", "SoruSahibiId", "SoruBasligi", "SoruGovdesi", "YorumSayisi", "GoruntulenmeSayisi", "OylanmaSayisi", "FiltreId", "SonAktiflikTarihi", "SonDuzenlenmeTarihi", "FavoriSayisi", "OlusturmaTarihi") VALUES (1, 1, 1, 'Android cihazda ısınma', 'Android cihazım sürekli ısınıyor neden olabilir', 1, 2, 1, 1, '2019-12-08', '2019-12-08', 0, '2019-12-08');
INSERT INTO public."Sorular" ("Id", "EtiketId", "SoruSahibiId", "SoruBasligi", "SoruGovdesi", "YorumSayisi", "GoruntulenmeSayisi", "OylanmaSayisi", "FiltreId", "SonAktiflikTarihi", "SonDuzenlenmeTarihi", "FavoriSayisi", "OlusturmaTarihi") VALUES (2, 2, 2, 'Google sertifika hatası', 'Google bende sertifika hatası veriyor neden', 1, 3, 1, 2, '2019-12-08', '2019-12-08', 0, '2019-11-08');
INSERT INTO public."Sorular" ("Id", "EtiketId", "SoruSahibiId", "SoruBasligi", "SoruGovdesi", "YorumSayisi", "GoruntulenmeSayisi", "OylanmaSayisi", "FiltreId", "SonAktiflikTarihi", "SonDuzenlenmeTarihi", "FavoriSayisi", "OlusturmaTarihi") VALUES (3, 3, 1, 'Windows 10 işletim sistemi', 'Windows 10 işletim sisteminde oyun modu çalışmıyor', 1, 2, 1, 3, '2019-12-08', '2019-12-08', 0, '2019-10-08');
INSERT INTO public."Sorular" ("Id", "EtiketId", "SoruSahibiId", "SoruBasligi", "SoruGovdesi", "YorumSayisi", "GoruntulenmeSayisi", "OylanmaSayisi", "FiltreId", "SonAktiflikTarihi", "SonDuzenlenmeTarihi", "FavoriSayisi", "OlusturmaTarihi") VALUES (4, 4, 2, 'session_regenerate_id() hangi durumlarda kullanılmalı', 'Oturum tespit ataklarının önlenmesi dışında bir işe yarıyor mu', 1, 4, 1, 4, '2019-12-08', '2019-12-08', 0, '2019-09-08');
INSERT INTO public."Sorular" ("Id", "EtiketId", "SoruSahibiId", "SoruBasligi", "SoruGovdesi", "YorumSayisi", "GoruntulenmeSayisi", "OylanmaSayisi", "FiltreId", "SonAktiflikTarihi", "SonDuzenlenmeTarihi", "FavoriSayisi", "OlusturmaTarihi") VALUES (5, 5, 1, 'apt-get update başarısız oldu', 'Sertifika veren 10.x sürümüne erişmeye çalışırken bilinmiyor', 1, 2, 1, 5, '2019-12-08', '2019-12-08', 0, '2019-08-08');
INSERT INTO public."Sorular" ("Id", "EtiketId", "SoruSahibiId", "SoruBasligi", "SoruGovdesi", "YorumSayisi", "GoruntulenmeSayisi", "OylanmaSayisi", "FiltreId", "SonAktiflikTarihi", "SonDuzenlenmeTarihi", "FavoriSayisi", "OlusturmaTarihi") VALUES (6, 6, 2, 'Bazı sayısal tışlar ve “f” tuşları ara sıra çalışmıyor', 'Klavyenin bağlantısını kestim ve terminalleri temizledikten sonra yeniden bağlandım.', 1, 3, 1, 6, '2019-12-08', '2019-12-08', 0, '2019-07-08');


--
-- Data for Name: Yanitlar; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Yanitlar" ("Id", "OyId", "SoruId", "KullaniciId", "YanitGovdesi", "YanitlanmaZamani") VALUES (1, 1, 1, 2, 'Aynı anda birden çok uygulama çalışıyor olabilir.', '2019-12-08');
INSERT INTO public."Yanitlar" ("Id", "OyId", "SoruId", "KullaniciId", "YanitGovdesi", "YanitlanmaZamani") VALUES (2, 2, 2, 1, 'İlgili sertifikayı tarayıcınıza yüklemeniz sorunu çözebilir.', '2019-12-08');
INSERT INTO public."Yanitlar" ("Id", "OyId", "SoruId", "KullaniciId", "YanitGovdesi", "YanitlanmaZamani") VALUES (3, 3, 3, 2, 'Windows + G tuş kombinasyonunu kullanın. ', '2019-12-08');
INSERT INTO public."Yanitlar" ("Id", "OyId", "SoruId", "KullaniciId", "YanitGovdesi", "YanitlanmaZamani") VALUES (4, 4, 4, 1, 'session_regenerate_id() işlevi geçerli oturum kimliğini yenisiyle değiştirirken oturum bigisini korur.

', '2019-12-08');
INSERT INTO public."Yanitlar" ("Id", "OyId", "SoruId", "KullaniciId", "YanitGovdesi", "YanitlanmaZamani") VALUES (5, 5, 5, 2, 'sudo apt install ca-certificates
ile sorunu çözebilirsiniz.', '2019-12-08');
INSERT INTO public."Yanitlar" ("Id", "OyId", "SoruId", "KullaniciId", "YanitGovdesi", "YanitlanmaZamani") VALUES (6, 6, 6, 1, ' xudo-xorg-input-all sudo apt-get install komutunu deneyiniz.', '2019-12-08');


--
-- Data for Name: Yonetici; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."Yonetici" ("Id", "KullaniciIsim", "KullaniciOlmaTarihi", "KullaniciSiteBaglantisi", "KullaniciProfilResmiBaglantisi", "SonGorulme", "ProfilGoruntulenmesi", "HakkindaGovdesi", "Yas", "ItibarSayisi", "ZiyaretEdilmeSayisi", "SoruSayisi", "KullaniciId", "TumSistemYetkisi") VALUES (1, 'Melih', '2019-07-08', 'https://sabis.sakarya.edu.tr/', 'https://sabis.sakarya.edu.tr/', '2019-12-08', 7, 'Merhaba benim adım Melih!', 20, 5, 12, 3, 1, true);
INSERT INTO public."Yonetici" ("Id", "KullaniciIsim", "KullaniciOlmaTarihi", "KullaniciSiteBaglantisi", "KullaniciProfilResmiBaglantisi", "SonGorulme", "ProfilGoruntulenmesi", "HakkindaGovdesi", "Yas", "ItibarSayisi", "ZiyaretEdilmeSayisi", "SoruSayisi", "KullaniciId", "TumSistemYetkisi") VALUES (2, 'Muhammed', '2019-07-08', 'https://sabis.sakarya.edu.tr/', 'https://sabis.sakarya.edu.tr/', '2019-12-08', 15, 'Merhaba benim adım Muhammed!', 20, 7, 17, 4, 2, true);


--
-- Data for Name: YukariOy; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public."YukariOy" ("OyTipiId", "ItibarArti") VALUES (1, 5);
INSERT INTO public."YukariOy" ("OyTipiId", "ItibarArti") VALUES (2, 5);
INSERT INTO public."YukariOy" ("OyTipiId", "ItibarArti") VALUES (3, 5);


--
-- Name: AltinRozet AltinRozetPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."AltinRozet"
    ADD CONSTRAINT "AltinRozetPK" PRIMARY KEY ("RozetId");


--
-- Name: AsagiOy AsagiOyPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."AsagiOy"
    ADD CONSTRAINT "AsagiOyPK" PRIMARY KEY ("OyTipiId");


--
-- Name: BronzRozet BronzRozetPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."BronzRozet"
    ADD CONSTRAINT "BronzRozetPK" PRIMARY KEY ("RozetId");


--
-- Name: Editor EditorPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Editor"
    ADD CONSTRAINT "EditorPK" PRIMARY KEY ("KullaniciId");


--
-- Name: Etiketler Etiketler_Id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Etiketler"
    ADD CONSTRAINT "Etiketler_Id_key" UNIQUE ("Id");


--
-- Name: GumusRozet GumusRozetPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."GumusRozet"
    ADD CONSTRAINT "GumusRozetPK" PRIMARY KEY ("RozetId");


--
-- Name: Kullanicilar KullanicilarPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Kullanicilar"
    ADD CONSTRAINT "KullanicilarPK" PRIMARY KEY ("Id");


--
-- Name: OyTipi OyTipiPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."OyTipi"
    ADD CONSTRAINT "OyTipiPK" PRIMARY KEY ("Id");


--
-- Name: Oylar OylarPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Oylar"
    ADD CONSTRAINT "OylarPK" PRIMARY KEY ("Id");


--
-- Name: Rozetler RozetlerPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Rozetler"
    ADD CONSTRAINT "RozetlerPK" PRIMARY KEY ("Id");


--
-- Name: SoruGecmisTipi SoruGecmisTipiPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGecmisTipi"
    ADD CONSTRAINT "SoruGecmisTipiPK" PRIMARY KEY ("Id");


--
-- Name: SoruGecmisi SoruGecmisiPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGecmisi"
    ADD CONSTRAINT "SoruGecmisiPK" PRIMARY KEY ("Id");


--
-- Name: SoruGecmisi SoruGecmisi_SoruGecmisTipiId_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGecmisi"
    ADD CONSTRAINT "SoruGecmisi_SoruGecmisTipiId_key" UNIQUE ("SoruGecmisTipiId");


--
-- Name: SoruGecmisi SoruGecmisi_SoruId_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGecmisi"
    ADD CONSTRAINT "SoruGecmisi_SoruId_key" UNIQUE ("SoruId");


--
-- Name: SoruGeriBildirimleri SoruGeriBildirimleriPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGeriBildirimleri"
    ADD CONSTRAINT "SoruGeriBildirimleriPK" PRIMARY KEY ("Id");


--
-- Name: Sorular SorularPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Sorular"
    ADD CONSTRAINT "SorularPK" PRIMARY KEY ("Id");


--
-- Name: Sorular Sorular_OlusturmaTarihi_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Sorular"
    ADD CONSTRAINT "Sorular_OlusturmaTarihi_key" UNIQUE ("OlusturmaTarihi");


--
-- Name: Yanitlar YanitlarPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yanitlar"
    ADD CONSTRAINT "YanitlarPK" PRIMARY KEY ("Id");


--
-- Name: Yonetici YoneticiPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yonetici"
    ADD CONSTRAINT "YoneticiPK" PRIMARY KEY ("KullaniciId");


--
-- Name: YukariOy YukariOyPK; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."YukariOy"
    ADD CONSTRAINT "YukariOyPK" PRIMARY KEY ("OyTipiId");


--
-- Name: AltinRozet AltinRozetFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."AltinRozet"
    ADD CONSTRAINT "AltinRozetFK" FOREIGN KEY ("RozetId") REFERENCES public."Rozetler"("Id");


--
-- Name: AsagiOy AsagiOyFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."AsagiOy"
    ADD CONSTRAINT "AsagiOyFK" FOREIGN KEY ("OyTipiId") REFERENCES public."OyTipi"("Id");


--
-- Name: BronzRozet BronzRozetFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."BronzRozet"
    ADD CONSTRAINT "BronzRozetFK" FOREIGN KEY ("RozetId") REFERENCES public."Rozetler"("Id");


--
-- Name: Editor EditorFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Editor"
    ADD CONSTRAINT "EditorFK" FOREIGN KEY ("KullaniciId") REFERENCES public."Kullanicilar"("Id");


--
-- Name: GumusRozet GumusRozetFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."GumusRozet"
    ADD CONSTRAINT "GumusRozetFK" FOREIGN KEY ("RozetId") REFERENCES public."Rozetler"("Id");


--
-- Name: OyTipi OyTipiFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."OyTipi"
    ADD CONSTRAINT "OyTipiFK" FOREIGN KEY ("OyId") REFERENCES public."Oylar"("Id");


--
-- Name: Oylar OylarKullaniciFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Oylar"
    ADD CONSTRAINT "OylarKullaniciFK" FOREIGN KEY ("KullaniciId") REFERENCES public."Kullanicilar"("Id");


--
-- Name: Oylar OylarSoruFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Oylar"
    ADD CONSTRAINT "OylarSoruFK" FOREIGN KEY ("SoruId") REFERENCES public."Sorular"("Id");


--
-- Name: Rozetler RozetlerFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Rozetler"
    ADD CONSTRAINT "RozetlerFK" FOREIGN KEY ("KullaniciId") REFERENCES public."Kullanicilar"("Id");


--
-- Name: SoruEtiketleri SoruEtiketleriEtiketFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruEtiketleri"
    ADD CONSTRAINT "SoruEtiketleriEtiketFK" FOREIGN KEY ("EtiketId") REFERENCES public."Etiketler"("Id");


--
-- Name: SoruEtiketleri SoruEtiketleriSoruFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruEtiketleri"
    ADD CONSTRAINT "SoruEtiketleriSoruFK" FOREIGN KEY ("SoruId") REFERENCES public."Sorular"("Id");


--
-- Name: SoruGecmisi SoruGecmisiSoruGecmisTipiIdFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGecmisi"
    ADD CONSTRAINT "SoruGecmisiSoruGecmisTipiIdFK" FOREIGN KEY ("SoruGecmisTipiId") REFERENCES public."SoruGecmisi"("Id");


--
-- Name: SoruGecmisi SoruGecmisiSoruIdFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGecmisi"
    ADD CONSTRAINT "SoruGecmisiSoruIdFK" FOREIGN KEY ("SoruId") REFERENCES public."Sorular"("Id");


--
-- Name: SoruGecmisi SoruGecmisiSoruSahibiFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGecmisi"
    ADD CONSTRAINT "SoruGecmisiSoruSahibiFK" FOREIGN KEY ("SoruSahibiId") REFERENCES public."Kullanicilar"("Id");


--
-- Name: SoruGecmisi SoruGecmisiSorulmaTarihiFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGecmisi"
    ADD CONSTRAINT "SoruGecmisiSorulmaTarihiFK" FOREIGN KEY ("SorulmaTarihi") REFERENCES public."Sorular"("OlusturmaTarihi");


--
-- Name: SoruGeriBildirimleri SoruGeriBildirimleriOyTipiIdFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGeriBildirimleri"
    ADD CONSTRAINT "SoruGeriBildirimleriOyTipiIdFK" FOREIGN KEY ("OyTipiId") REFERENCES public."OyTipi"("Id");


--
-- Name: SoruGeriBildirimleri SoruGeriBildirimleriSoruIdFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."SoruGeriBildirimleri"
    ADD CONSTRAINT "SoruGeriBildirimleriSoruIdFK" FOREIGN KEY ("SoruId") REFERENCES public."Sorular"("Id");


--
-- Name: Sorular SorularEtiketFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Sorular"
    ADD CONSTRAINT "SorularEtiketFK" FOREIGN KEY ("EtiketId") REFERENCES public."Etiketler"("Id");


--
-- Name: Sorular SorularSoruSahibiFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Sorular"
    ADD CONSTRAINT "SorularSoruSahibiFK" FOREIGN KEY ("SoruSahibiId") REFERENCES public."Kullanicilar"("Id");


--
-- Name: Yanitlar YanitlarKullaniciIdFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yanitlar"
    ADD CONSTRAINT "YanitlarKullaniciIdFK" FOREIGN KEY ("KullaniciId") REFERENCES public."Kullanicilar"("Id");


--
-- Name: Yanitlar YanitlarOyIdFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yanitlar"
    ADD CONSTRAINT "YanitlarOyIdFK" FOREIGN KEY ("OyId") REFERENCES public."Oylar"("Id");


--
-- Name: Yanitlar YanitlarSoruIdFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yanitlar"
    ADD CONSTRAINT "YanitlarSoruIdFK" FOREIGN KEY ("SoruId") REFERENCES public."Sorular"("Id");


--
-- Name: Yonetici YoneticiFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Yonetici"
    ADD CONSTRAINT "YoneticiFK" FOREIGN KEY ("KullaniciId") REFERENCES public."Kullanicilar"("Id");


--
-- Name: YukariOy YukariOyFK; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."YukariOy"
    ADD CONSTRAINT "YukariOyFK" FOREIGN KEY ("OyTipiId") REFERENCES public."OyTipi"("Id");


--
-- PostgreSQL database dump complete
--

