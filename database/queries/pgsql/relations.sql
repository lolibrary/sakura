--
-- PostgreSQL database dump
--

\restrict PemEy47ugV4lu5Qz9tMYckJnejDPkuS9GaFfVJjJr3aqPZn8jSJVqdlnvARKfKd

-- Dumped from database version 18.4 (2773af8)
-- Dumped by pg_dump version 18.3 (Homebrew)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: attributes; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.attributes (id, slug, created_at, updated_at) FROM stdin;
9ddb8f74-b103-43bb-aee4-aa3273a84818	bust	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
73e5168c-6aa7-497e-b8ea-c1f14ee71494	length	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
f2ed336b-8ef5-4a07-833e-ac85f6bbd45f	waist	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
98f6e9e0-6515-44e3-88d8-18036c72e62e	owner-height	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
ca4d2b96-4fbe-484e-a478-c9e6e4cc6a05	owner-length	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
ce3358d7-05b4-4e8a-9a17-02039239760c	owner-waist	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
788cf361-e119-4e15-bb66-bdc886bb93cd	cuff	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
7fb26f02-fe4b-44d6-be1d-8906355738ef	shoulder-width	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
b78fa491-044c-42d7-b8f8-248fe9399d75	sleeve-length	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
13376ba0-6cb1-41a3-929c-0179d405b881	owner-notes	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
9bf9205e-46b8-4b60-8b31-c734e35e0176	owner-bust	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
697b2dad-8a60-4e58-8fbc-5e7ea39d7e6b	owner-underbust	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
22aa74f9-9cc2-4075-8123-5396606720e6	heel-height	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
7f6d1524-57c9-47d7-becc-ef3ca4ed3d2a	material	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
2f2f4e54-b222-44a5-bba4-e86510afec38	soles	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
dfcbdd1e-b24a-4f2f-b4c3-19aff5092e8c	finishes	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
be3d27e2-a5e5-4662-9691-52fa47cfc312	skirt-length	2017-08-14 11:23:51+00	2017-08-14 11:23:51+00
dd0f0124-7cce-4dce-991a-4cf75ab8eebd	hip	2017-08-15 10:26:13+00	2017-08-15 10:26:13+00
b49203f7-eb3f-4179-8a4e-1bb94a805110	inseam	2017-08-15 10:26:29+00	2017-08-15 10:26:29+00
e9fa9aaa-d5ec-4ff0-ae98-aba41b658517	thigh	2017-08-15 10:26:44+00	2017-08-15 10:26:44+00
65a9f6c5-8926-4090-ad7e-57d160166602	depth	2020-01-03 18:24:15+00	2020-01-03 18:24:15+00
e88348d1-8ddb-4419-8054-36ae7075c663	width	2020-01-03 18:25:44+00	2020-01-03 18:25:44+00
d2d9c5f1-447c-4caa-a588-2cde1315cdc0	neckline	2020-01-03 18:26:28+00	2020-01-03 18:26:28+00
8dbdb3ae-fe24-44e1-9163-d095f4ae13ea	diameter	2020-01-11 22:03:20+00	2020-01-11 22:03:20+00
4a0ec1e9-914e-4afb-af7a-4db2202c570c	height	2020-01-11 22:03:28+00	2020-01-11 22:03:28+00
bd8039f1-ee4d-43bc-88b5-148f75c74273	shoulder-strap	2020-01-11 22:34:50+00	2020-01-11 22:34:50+00
1c59c341-3a0a-4457-8808-b7d583b83996	bodice-length	2020-01-27 18:13:04+00	2020-01-27 18:13:04+00
fb218f89-f9b6-4a55-bfe1-f1e092672b7e	hem-circumference	2020-02-06 06:18:14+00	2020-02-06 06:18:14+00
d027eadb-0761-42ae-b84c-0ab46555355a	handle length	2020-03-08 07:47:21+00	2020-03-08 07:47:21+00
8e4ca4ae-2b52-46f7-824c-7adbeed0b613	sleeve-width	2020-03-22 17:55:37+00	2020-03-22 17:55:37+00
b54ff94b-76fe-4774-b5df-b08eaf582da1	rise	2022-03-04 22:07:00+00	2022-03-04 22:07:00+00
90910516-2fdf-4215-9e73-e2c943701d3b	country-of-origin	2022-12-07 18:10:29+00	2022-12-07 18:10:29+00
\.


--
-- Data for Name: attribute_translations; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.attribute_translations (id, attribute_id, locale, name, created_at, updated_at) FROM stdin;
1	9ddb8f74-b103-43bb-aee4-aa3273a84818	en	Bust	\N	\N
2	73e5168c-6aa7-497e-b8ea-c1f14ee71494	en	Length	\N	\N
3	f2ed336b-8ef5-4a07-833e-ac85f6bbd45f	en	Waist	\N	\N
4	98f6e9e0-6515-44e3-88d8-18036c72e62e	en	Owner Height	\N	\N
5	ca4d2b96-4fbe-484e-a478-c9e6e4cc6a05	en	Owner Length	\N	\N
6	ce3358d7-05b4-4e8a-9a17-02039239760c	en	Owner Waist	\N	\N
7	788cf361-e119-4e15-bb66-bdc886bb93cd	en	Cuff	\N	\N
8	7fb26f02-fe4b-44d6-be1d-8906355738ef	en	Shoulder Width	\N	\N
9	b78fa491-044c-42d7-b8f8-248fe9399d75	en	Sleeve Length	\N	\N
10	13376ba0-6cb1-41a3-929c-0179d405b881	en	Owner Notes	\N	\N
11	9bf9205e-46b8-4b60-8b31-c734e35e0176	en	Owner Bust	\N	\N
12	697b2dad-8a60-4e58-8fbc-5e7ea39d7e6b	en	Owner Underbust	\N	\N
13	22aa74f9-9cc2-4075-8123-5396606720e6	en	Heel Height	\N	\N
14	7f6d1524-57c9-47d7-becc-ef3ca4ed3d2a	en	Material	\N	\N
15	2f2f4e54-b222-44a5-bba4-e86510afec38	en	Soles	\N	\N
16	dfcbdd1e-b24a-4f2f-b4c3-19aff5092e8c	en	Finishes	\N	\N
17	be3d27e2-a5e5-4662-9691-52fa47cfc312	en	Skirt Length	\N	\N
18	dd0f0124-7cce-4dce-991a-4cf75ab8eebd	en	Hip	\N	\N
19	b49203f7-eb3f-4179-8a4e-1bb94a805110	en	Inseam	\N	\N
20	e9fa9aaa-d5ec-4ff0-ae98-aba41b658517	en	Thigh	\N	\N
21	65a9f6c5-8926-4090-ad7e-57d160166602	en	Depth	\N	\N
22	e88348d1-8ddb-4419-8054-36ae7075c663	en	Width	\N	\N
23	d2d9c5f1-447c-4caa-a588-2cde1315cdc0	en	Neckline	\N	\N
24	8dbdb3ae-fe24-44e1-9163-d095f4ae13ea	en	Diameter	\N	\N
25	4a0ec1e9-914e-4afb-af7a-4db2202c570c	en	Height	\N	\N
26	bd8039f1-ee4d-43bc-88b5-148f75c74273	en	Shoulder Strap	\N	\N
27	1c59c341-3a0a-4457-8808-b7d583b83996	en	Bodice Length	\N	\N
28	fb218f89-f9b6-4a55-bfe1-f1e092672b7e	en	Hem Circumference	\N	\N
29	d027eadb-0761-42ae-b84c-0ab46555355a	en	Handle Length	\N	\N
30	8e4ca4ae-2b52-46f7-824c-7adbeed0b613	en	Sleeve Width	\N	\N
31	b54ff94b-76fe-4774-b5df-b08eaf582da1	en	Rise	\N	\N
32	90910516-2fdf-4215-9e73-e2c943701d3b	en	Country Of Origin	\N	\N
65	98f6e9e0-6515-44e3-88d8-18036c72e62e	fr	Taille (hauteur) d'un.e propriétaire	\N	\N
66	b54ff94b-76fe-4774-b5df-b08eaf582da1	fr	Entrejambe	\N	\N
67	e9fa9aaa-d5ec-4ff0-ae98-aba41b658517	fr	Cuisse	\N	\N
68	697b2dad-8a60-4e58-8fbc-5e7ea39d7e6b	fr	Dessous de poitrine d'un.e propriétaire	\N	\N
69	d027eadb-0761-42ae-b84c-0ab46555355a	fr	Longueur de la anse/poignée	\N	\N
70	d2d9c5f1-447c-4caa-a588-2cde1315cdc0	fr	Col	\N	\N
71	bd8039f1-ee4d-43bc-88b5-148f75c74273	fr	Bretelle(s)	\N	\N
72	90910516-2fdf-4215-9e73-e2c943701d3b	fr	Pays d'origine	\N	\N
73	b49203f7-eb3f-4179-8a4e-1bb94a805110	fr	Entrejambe	\N	\N
74	8dbdb3ae-fe24-44e1-9163-d095f4ae13ea	fr	Diamètre	\N	\N
75	dd0f0124-7cce-4dce-991a-4cf75ab8eebd	fr	Hanches	\N	\N
76	ca4d2b96-4fbe-484e-a478-c9e6e4cc6a05	fr	Hauteur d'un.e propriétaire	\N	\N
77	1c59c341-3a0a-4457-8808-b7d583b83996	fr	Longueur du bustier	\N	\N
78	9bf9205e-46b8-4b60-8b31-c734e35e0176	fr	Tour de poitrine d'un.e propriétaire	\N	\N
79	8e4ca4ae-2b52-46f7-824c-7adbeed0b613	fr	Largeur des manches	\N	\N
80	ce3358d7-05b4-4e8a-9a17-02039239760c	fr	Tour de taille d'un.e propriétaire	\N	\N
81	2f2f4e54-b222-44a5-bba4-e86510afec38	fr	Semelles	\N	\N
82	dfcbdd1e-b24a-4f2f-b4c3-19aff5092e8c	fr	Finitions	\N	\N
83	65a9f6c5-8926-4090-ad7e-57d160166602	fr	Profondeur	\N	\N
84	fb218f89-f9b6-4a55-bfe1-f1e092672b7e	fr	Circonférence de l'ourlet / du bord	\N	\N
85	22aa74f9-9cc2-4075-8123-5396606720e6	fr	Hauteur du talon	\N	\N
86	4a0ec1e9-914e-4afb-af7a-4db2202c570c	fr	Hauteur	\N	\N
87	13376ba0-6cb1-41a3-929c-0179d405b881	fr	Notes d'un.e propriétaire	\N	\N
88	e88348d1-8ddb-4419-8054-36ae7075c663	fr	Largeur	\N	\N
89	be3d27e2-a5e5-4662-9691-52fa47cfc312	fr	Longueur de la jupe	\N	\N
90	788cf361-e119-4e15-bb66-bdc886bb93cd	fr	Ouverture de la manche (poignet)	\N	\N
91	7fb26f02-fe4b-44d6-be1d-8906355738ef	fr	Largeur des épaules	\N	\N
92	b78fa491-044c-42d7-b8f8-248fe9399d75	fr	Longueur des manches	\N	\N
93	7f6d1524-57c9-47d7-becc-ef3ca4ed3d2a	fr	Matériaux	\N	\N
94	9ddb8f74-b103-43bb-aee4-aa3273a84818	fr	Poitrine	\N	\N
95	f2ed336b-8ef5-4a07-833e-ac85f6bbd45f	fr	Tour de taille	\N	\N
96	73e5168c-6aa7-497e-b8ea-c1f14ee71494	fr	Longueur	\N	\N
97	98f6e9e0-6515-44e3-88d8-18036c72e62e	nb_NO	Eierhøyde	\N	\N
98	e9fa9aaa-d5ec-4ff0-ae98-aba41b658517	nb_NO	Lår	\N	\N
99	73e5168c-6aa7-497e-b8ea-c1f14ee71494	nb_NO	Lengde	\N	\N
167	98f6e9e0-6515-44e3-88d8-18036c72e62e	nl	Eigenaars hoogte	\N	\N
168	b54ff94b-76fe-4774-b5df-b08eaf582da1	nl	Zithoogte	\N	\N
169	e9fa9aaa-d5ec-4ff0-ae98-aba41b658517	nl	Bovenbeen	\N	\N
170	697b2dad-8a60-4e58-8fbc-5e7ea39d7e6b	nl	Eigenaars onderborst	\N	\N
171	d027eadb-0761-42ae-b84c-0ab46555355a	nl	Handvat lengte	\N	\N
172	d2d9c5f1-447c-4caa-a588-2cde1315cdc0	nl	Halslijn	\N	\N
173	bd8039f1-ee4d-43bc-88b5-148f75c74273	nl	Schouderbanden	\N	\N
174	90910516-2fdf-4215-9e73-e2c943701d3b	nl	Land van herkomst	\N	\N
175	b49203f7-eb3f-4179-8a4e-1bb94a805110	nl	Binnenbeenlengte	\N	\N
176	8dbdb3ae-fe24-44e1-9163-d095f4ae13ea	nl	Diameter	\N	\N
177	dd0f0124-7cce-4dce-991a-4cf75ab8eebd	nl	Heup	\N	\N
178	ca4d2b96-4fbe-484e-a478-c9e6e4cc6a05	nl	Eigenaars lengte	\N	\N
179	1c59c341-3a0a-4457-8808-b7d583b83996	nl	Lijfje lengte	\N	\N
180	9bf9205e-46b8-4b60-8b31-c734e35e0176	nl	Eigenaars borstomtrek	\N	\N
181	8e4ca4ae-2b52-46f7-824c-7adbeed0b613	nl	Mouw breedte	\N	\N
182	ce3358d7-05b4-4e8a-9a17-02039239760c	nl	Eigenaars taille	\N	\N
183	2f2f4e54-b222-44a5-bba4-e86510afec38	nl	Zolen	\N	\N
184	dfcbdd1e-b24a-4f2f-b4c3-19aff5092e8c	nl	Afwerkingen	\N	\N
185	65a9f6c5-8926-4090-ad7e-57d160166602	nl	Diepte	\N	\N
186	fb218f89-f9b6-4a55-bfe1-f1e092672b7e	nl	Zoomomtrek	\N	\N
187	22aa74f9-9cc2-4075-8123-5396606720e6	nl	Hak hoogte	\N	\N
188	4a0ec1e9-914e-4afb-af7a-4db2202c570c	nl	Hoogte	\N	\N
189	13376ba0-6cb1-41a3-929c-0179d405b881	nl	Eigenaars notities	\N	\N
190	e88348d1-8ddb-4419-8054-36ae7075c663	nl	Breedte	\N	\N
191	be3d27e2-a5e5-4662-9691-52fa47cfc312	nl	Rok lengte	\N	\N
192	788cf361-e119-4e15-bb66-bdc886bb93cd	nl	Manchet	\N	\N
193	7fb26f02-fe4b-44d6-be1d-8906355738ef	nl	Schouder breedte	\N	\N
194	b78fa491-044c-42d7-b8f8-248fe9399d75	nl	Mouwlengte	\N	\N
195	7f6d1524-57c9-47d7-becc-ef3ca4ed3d2a	nl	Materiaal	\N	\N
196	9ddb8f74-b103-43bb-aee4-aa3273a84818	nl	Borstomtrek	\N	\N
197	f2ed336b-8ef5-4a07-833e-ac85f6bbd45f	nl	Taille	\N	\N
198	73e5168c-6aa7-497e-b8ea-c1f14ee71494	nl	Lengte	\N	\N
263	98f6e9e0-6515-44e3-88d8-18036c72e62e	it	Altezza Secondo Un Proprietario	\N	\N
264	d2d9c5f1-447c-4caa-a588-2cde1315cdc0	it	Scollatura	\N	\N
265	bd8039f1-ee4d-43bc-88b5-148f75c74273	it	Spalline	\N	\N
266	90910516-2fdf-4215-9e73-e2c943701d3b	it	Paese Di Origine	\N	\N
267	b49203f7-eb3f-4179-8a4e-1bb94a805110	it	Cucitura Interna	\N	\N
268	8dbdb3ae-fe24-44e1-9163-d095f4ae13ea	it	Diametro	\N	\N
269	dd0f0124-7cce-4dce-991a-4cf75ab8eebd	it	Fianchi	\N	\N
270	ca4d2b96-4fbe-484e-a478-c9e6e4cc6a05	it	Lunghezza Secondo Un Proprietario	\N	\N
271	1c59c341-3a0a-4457-8808-b7d583b83996	it	Lunghezza Del Corpetto	\N	\N
272	9bf9205e-46b8-4b60-8b31-c734e35e0176	it	Busto Secondo Un Proprietario	\N	\N
273	8e4ca4ae-2b52-46f7-824c-7adbeed0b613	it	Larghezza Delle Maniche	\N	\N
274	ce3358d7-05b4-4e8a-9a17-02039239760c	it	Vita Secondo Un Proprietario	\N	\N
275	2f2f4e54-b222-44a5-bba4-e86510afec38	it	Suole	\N	\N
276	dfcbdd1e-b24a-4f2f-b4c3-19aff5092e8c	it	Finiture	\N	\N
277	fb218f89-f9b6-4a55-bfe1-f1e092672b7e	it	Circonferenza Dell'Orlo	\N	\N
278	22aa74f9-9cc2-4075-8123-5396606720e6	it	Altezza Del Tacco	\N	\N
279	4a0ec1e9-914e-4afb-af7a-4db2202c570c	it	Altezza	\N	\N
280	e88348d1-8ddb-4419-8054-36ae7075c663	it	Larghezza	\N	\N
281	be3d27e2-a5e5-4662-9691-52fa47cfc312	it	Lunghezza della gonna	\N	\N
282	788cf361-e119-4e15-bb66-bdc886bb93cd	it	Polsino	\N	\N
283	7fb26f02-fe4b-44d6-be1d-8906355738ef	it	Larghezza Spalle	\N	\N
284	b78fa491-044c-42d7-b8f8-248fe9399d75	it	Lunghezza manica	\N	\N
285	9ddb8f74-b103-43bb-aee4-aa3273a84818	it	Busto	\N	\N
286	f2ed336b-8ef5-4a07-833e-ac85f6bbd45f	it	Vita	\N	\N
287	73e5168c-6aa7-497e-b8ea-c1f14ee71494	it	Lunghezza	\N	\N
288	b54ff94b-76fe-4774-b5df-b08eaf582da1	it	Cavallo	\N	\N
289	7f6d1524-57c9-47d7-becc-ef3ca4ed3d2a	it	Materiale	\N	\N
290	13376ba0-6cb1-41a3-929c-0179d405b881	it	Note Di Chi Lo Possiede	\N	\N
291	65a9f6c5-8926-4090-ad7e-57d160166602	it	Profondità	\N	\N
292	697b2dad-8a60-4e58-8fbc-5e7ea39d7e6b	it	Sottobusto Secondo Un Proprietario	\N	\N
293	e9fa9aaa-d5ec-4ff0-ae98-aba41b658517	it	Coscia	\N	\N
294	d027eadb-0761-42ae-b84c-0ab46555355a	it	Lunghezza Maniglia	\N	\N
\.


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.brands (id, slug, short_name, description, created_at, updated_at, image) FROM stdin;
ecb829b3-8a9e-4348-8945-b985ede7f03a	angelic-pretty	ap		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/angelic-pretty.png
0e29621e-5cd5-4814-957c-903808652c6c	baby-the-stars-shine-bright	btssb		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/baby-the-stars-shine-bright.png
1d849c42-a991-48e5-a1cc-dde246782651	innocent-world	iw		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/innocent-world.png
d6f7698e-bdf2-4b91-825b-4ebabbca75d0	alice-and-the-pirates	aatp		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/alice-and-the-pirates.png
8c0a5cd7-15a2-4c36-a59a-19062c1ceb9b	metamorphose-temps-de-fille	meta		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/metamorphose-temps-de-fille.png
33378176-432a-4676-8f99-4e1167de9bdf	jane-marple	jane-marple		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/jane-marple.png
ef5cf9ed-b62e-47fb-a2ed-ad25c3c35d17	victorian-maiden	victorian-maiden		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/victorian-maiden.png
f60edf85-4466-4369-ae4a-753073f11b58	atelier-boz	atelier-boz		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/atelier-boz.png
bf16c13c-1775-47c5-8d95-0c57895de258	excentrique	excentrique		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/excentrique.png
9c9dab7d-cbe4-4817-8f0b-8f3a2001cac2	bodyline	bodyline		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/bodyline.png
53da5b54-735a-4912-ae27-b1a0fc1659ff	moi-meme-moitie	moitie		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/moi-meme-moitie.png
19cd58ae-7ea2-41f1-a145-9caf83cde401	juliette-et-justine	j-et-j		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/juliette-et-justine.png
4da985ce-4d52-40ad-ba7f-18d6650926bc	mary-magdalene	mary-magdalene		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/mary-magdalene.png
8a4bfb01-81e7-4b19-994f-48b40716ea93	putumayo	putumayo		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/putumayo.png
0751c2d7-bc5b-4ec2-a69a-315cf8305162	antique-beast	antique-beast		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/antique-beast.png
1205a7b6-c82b-4744-baaf-4465be8317d7	atelier-pierrot	atelier-pierrot		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/atelier-pierrot.png
6ed4636f-561b-4161-ba78-14e58ca83ca2	black-peace-now	bpn		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/black-peace-now.png
642e97e5-2dd8-4a5f-bd54-c6ce7c846053	beth	beth		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/beth.jpeg
ef82cf8e-38af-4ddc-8cf3-f43b1c3b29a1	emily-shirley-temple-cute	emily-temple-cute		2017-03-20 09:29:51+00	2020-01-29 21:41:19+00	brands/xZTXRKMoKUAXEKeyVx5rmhxoRhKROBrPnnjt3PhT.png
b24938af-de30-4f81-8b57-c2192ca6c507	indie-brand	indie		2017-03-20 09:29:51+00	2021-04-06 02:08:21+00	brands/k5sFUaJjtArTDv1DGJhyRmEFf03VBR4n69kjVjl1.svg
be220d8b-bffc-42a4-a073-9c886e6fe79f	chinese-indie	chinese-indie		2017-03-20 09:29:51+00	2023-05-17 17:53:06+00	brands/Na8X6UsdWxEjDKNutzcJfHq8drbnLnGoMaXcHElW.svg
e8c88299-fa80-468a-a719-e86501237c88	h-naoto	h-naoto		2017-03-20 09:29:51+00	2023-07-31 20:49:42+00	brands/h-naoto.png
6b0cb2ca-8f53-4320-b2d7-232c3e333497	maxicimam	max		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/maxicimam.png
f454192f-93b8-4635-9409-b066c8d24c69	cornet	cornet		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/cornet.png
66bc41c7-11f8-4dd2-a43c-8a0312d12a3f	grimoire	grimoire		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/grimoire.png
5f422ee1-11b8-4593-a6d3-9eef471ae10e	heart-e	heart-e		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/heart-e.png
8025f54f-05a3-4ea5-bfa9-08dc4a4957f8	6dokidoki	dokidoki		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/6dokidoki.png
d6702e87-d724-4b2f-9b2d-3a454d0f0dc3	physical-drop	physical-drop		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/physical-drop.png
bc40549b-db09-4c03-8461-e5b37766009e	millefleurs	millefleurs		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/millefleurs.png
68d9a41d-0297-4f01-96be-b2c6d2b359a1	pink-house	pink-house		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/pink-house.png
d7f9dfb9-49a1-475c-825a-6d49d7fe6af7	vivienne-westwood	vivienne-westwood		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/vivienne-westwood.png
5aaa0ed0-7203-4ead-965c-46009ded4225	haenuli	haenuli		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/haenuli.png
db054a75-a12c-49c3-b97d-7589f238b31e	surface-spell	surface-spell		2017-03-20 09:29:51+00	2018-09-05 19:38:11+00	brands/surface-spell.png
00d02505-12c9-4785-94f7-a57eacd70fd0	chantilly	chantilly		2017-03-20 09:29:51+00	2018-09-05 19:46:33+00	brands/chantilly.png
3d36fee9-b2e6-4eae-a486-6f89b78306e4	sheglit	sheglit		2018-09-09 20:04:43+00	2018-09-09 20:04:43+00	brands/sheglit.png
dd82e2a2-8ed8-444f-a75f-85174eacfe71	milk	milk		2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	brands/milk.jpeg
7c476701-e8de-4c28-83bc-e70faef88256	lief	lief		2017-03-20 09:29:51+00	2019-12-19 19:44:59+00	brands/lPjyk6lBEDeKI55gIW9I6Ig9jcv82PzcAQZ1rVfg.jpeg
7b0096c0-59f8-4e05-a80c-a7701639072d	chess-story	chess-story		2017-03-20 09:29:51+00	2019-12-19 19:45:40+00	brands/QghIWYZ6dqIN6u930hKKpIcYuXVOPhA1OLv2QmnB.jpeg
5e5d054c-ddc1-49f4-8603-e8477a16049d	krad-lanrete	krad-lanrete		2018-09-05 19:54:10+00	2019-12-19 19:50:12+00	brands/R3nj11WfKDN7uevBProaw75pmtfjPB47upALe4Wp.jpeg
1117e0da-4f1c-4300-a266-f78fcb4770cd	offbrand	offbrand		2017-03-20 09:29:51+00	2019-12-19 19:51:30+00	brands/oeUZRgLW1lncTDLGxnqDRRrmWNq5ulic74lNyKSR.svg
439dee8a-5ef7-4c18-9375-6c74cd294030	chocochip-cookie	3c		2026-01-06 01:09:05+00	2026-01-06 01:09:05+00	brands/6jEjx9vNLnFEdEOH4LrMybwCiQjwAVB930jNStmM.gif
03eaf969-7a92-4696-8e3c-0957a1b6d56c	infanta	infanta		2017-03-20 09:29:51+00	2019-12-20 18:31:31+00	brands/ukhh9zdlu9w1f7Oo5gDalUG9gMjaLvfQK8F4CuHe.png
8320e562-5f82-4582-a686-c6ead83d3ff0	triple-fortune	tf		2019-12-23 22:27:51+00	2019-12-23 22:27:51+00	brands/qbah39MY99ApnwatktcRXXRLfKZmahAeJxQF5uFF.png
e558195a-d023-4e09-9fa3-a3f71dcbb3d0	baby-secret-love	bsl		2020-01-06 16:00:38+00	2020-01-06 16:00:38+00	brands/YmBeVKAe1AZdF6SRd4YBXTZvaAq5EAjUq4ereCUu.gif
ec0f1c3b-8199-487a-b90b-7e0334946ed8	mr	mr		2020-01-07 02:50:47+00	2020-01-07 02:50:47+00	brands/wmjNMWhJFyjGcV5CfQv3u7pLYSYAhencfbcGfLtq.png
4997efc7-a6ab-49d3-8896-7358fac58b49	shirley-temple	st		2020-01-29 21:45:54+00	2020-01-29 21:45:54+00	brands/vIp9iAj6Kh7Jhis0qrLQJ2x1w9Y5uPzy044rGbIv.png
81f17db0-90b6-49a6-b251-3b9a96e031cf	miho-matsuda	miho		2020-01-29 22:32:12+00	2020-01-29 22:37:23+00	brands/grbwcJnWUrzvxd5584PYaS2Rrv14tUcJUDEMH8gk.png
04952e3f-6aa5-4d8b-90f2-4eabb062dbb3	leur-getter	lg		2020-01-29 23:22:53+00	2020-01-29 23:22:53+00	brands/YUYAxdsgpyYyym131WOMVYmdCjfc1FoGFqOm2rgI.gif
3533676f-8dc0-4a70-8e3c-e7df2fa56494	q-pot	q-pot		2021-01-27 23:34:18+00	2021-01-27 23:59:32+00	brands/lSKUAB3KHQRgwNeeQprGZje6IH4e61u0kLrVnyEx.png
fddff2c5-a4ab-4c29-bf57-6790c56ba0ad	peppermint-fox	pepfox		2021-04-07 17:09:45+00	2021-04-07 17:09:45+00	brands/gPQSEGMOwySIUoLdpdVJ0IZKJr3hF8V1jF4rxt47.png
a19d0347-a7a5-45f0-ae5d-8455b1a4ede2	melody-basket	melobas		2024-02-23 00:43:29+00	2024-02-23 19:50:35+00	brands/3kxMPgAvuIbCdY3duat8XMpIpWayaRyiLjatHc1Y.png
a382da1b-262f-4ff0-8f58-9e767dab4769	soufflesong	soufflesong		2021-04-07 17:11:48+00	2021-04-07 17:15:40+00	brands/9Hd3q1ZnkgCOwy7HG6efxDezzWYI8tExW9WgBC8d.png
116ca4dc-1e10-4290-b03d-37f72e4ceb73	axes-femme	af		2022-01-07 04:58:47+00	2022-01-07 04:58:47+00	brands/x28VnoNHR1pnpRQ7ZChlKTGAppeH1mLd1VQgzDJH.png
4ce98f2f-5d17-4fd0-9207-4445840ed215	marble	marble		2023-01-13 22:13:40+00	2023-01-13 22:15:46+00	brands/cHcsHro7hQclGmOt3zEspOcAuzDMyQSj9MJEHrDO.png
66bd5ee8-d056-40d7-9d7b-3cde0d4c94dd	the-black-ribbon	tbr		2023-06-09 12:18:43+00	2023-06-09 12:19:18+00	brands/1cdDOTbfAQd3lw6DHo8PP6kJy8cfHy6c8EgdSuHl.jpeg
b44f3f0b-4b2d-492b-84d5-104240faf30c	wonderful-world	ww		2023-06-28 15:32:14+00	2023-06-28 15:32:14+00	brands/Z9lDFE8cvQOuPBla2nWZlf85ygVobsowXXwBzIFw.png
9b6888bf-0302-432f-82c2-451b3f1d47d9	royal-princess-alice	rpa		2023-11-18 00:25:00+00	2023-11-18 00:31:32+00	brands/fjfn98FSOLr72wXDIvbvW9muYjblqff3Y1UpIz8z.png
0d3ba807-9720-4c13-8d6b-e971f8600629	lady-sloth	lady-sloth		2024-02-14 02:16:22+00	2024-02-14 02:16:22+00	brands/dOSczcW2BLMNeXo3l2DJqmS3GKXHKglAG6WAQkEE.png
550f8311-8c5b-4c1a-9c2a-8f5a89f09d1a	hiroko-tokumine	ht		2024-03-14 14:54:04+00	2024-03-14 14:54:04+00	brands/hV4IU7Qq8rSsILIbgnE5DKkgCPFKrH9LkGiPqgiH.png
f404066a-fa60-4a5f-a42c-87269795d63e	belladonna	belladonna		2024-06-25 05:21:24+00	2024-06-25 05:21:24+00	brands/zVlxAZvDJY34VCtlJN8U7sNHYMqeqEGCi4BBb2FQ.png
a7cedc40-026d-40f8-9196-72d6453e32bc	anna-house	anna-house		2024-09-03 20:41:32+00	2024-09-03 20:41:32+00	brands/z7t4hiB1nVn8Aw6FowJIl8B9xZ76U9CaNLDAdNqH.webp
5f8425de-06c8-4fa1-8cd8-4c0850200ac7	wirehead	wirehead		2024-09-03 21:03:03+00	2024-09-03 21:03:03+00	brands/nprg9o6CUl5i4YnzGVtondtWpbyBVfSJHNQQUUCM.webp
4c773d98-4211-40b7-8243-1a286e3dc80f	dear-celine	dc		2024-09-04 00:29:18+00	2024-09-04 00:59:49+00	brands/ChcrHtaQhDp7gW7QVxUnhdHTwKiPEOArgEzWM8IO.png
ca0339b4-02a3-4b3d-9da4-2863e1a48ffd	nah	nah		2025-05-28 16:07:28+00	2025-05-28 16:07:28+00	brands/NRhJaWPE07G8qFCdioHshINQIRUAnrkCYkBO4qvU.jpeg
\.


--
-- Data for Name: brand_translations; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.brand_translations (id, brand_id, locale, name, created_at, updated_at) FROM stdin;
1	ecb829b3-8a9e-4348-8945-b985ede7f03a	en	Angelic Pretty	\N	\N
2	0e29621e-5cd5-4814-957c-903808652c6c	en	Baby, the Stars Shine Bright	\N	\N
3	1d849c42-a991-48e5-a1cc-dde246782651	en	Innocent World	\N	\N
4	d6f7698e-bdf2-4b91-825b-4ebabbca75d0	en	Alice and the Pirates	\N	\N
5	8c0a5cd7-15a2-4c36-a59a-19062c1ceb9b	en	Metamorphose Temps de Fille	\N	\N
6	33378176-432a-4676-8f99-4e1167de9bdf	en	Jane Marple	\N	\N
7	ef5cf9ed-b62e-47fb-a2ed-ad25c3c35d17	en	Victorian Maiden	\N	\N
8	f60edf85-4466-4369-ae4a-753073f11b58	en	Atelier Boz	\N	\N
9	bf16c13c-1775-47c5-8d95-0c57895de258	en	Excentrique	\N	\N
10	9c9dab7d-cbe4-4817-8f0b-8f3a2001cac2	en	Bodyline	\N	\N
11	53da5b54-735a-4912-ae27-b1a0fc1659ff	en	Moi-même-Moitié	\N	\N
12	19cd58ae-7ea2-41f1-a145-9caf83cde401	en	Juliette et Justine	\N	\N
13	4da985ce-4d52-40ad-ba7f-18d6650926bc	en	Mary Magdalene	\N	\N
14	8a4bfb01-81e7-4b19-994f-48b40716ea93	en	Putumayo	\N	\N
15	0751c2d7-bc5b-4ec2-a69a-315cf8305162	en	Antique Beast	\N	\N
16	1205a7b6-c82b-4744-baaf-4465be8317d7	en	Atelier Pierrot	\N	\N
17	6ed4636f-561b-4161-ba78-14e58ca83ca2	en	Black Peace Now	\N	\N
18	642e97e5-2dd8-4a5f-bd54-c6ce7c846053	en	Beth	\N	\N
19	ef82cf8e-38af-4ddc-8cf3-f43b1c3b29a1	en	Emily Temple Cute	\N	\N
20	b24938af-de30-4f81-8b57-c2192ca6c507	en	Indie Brand	\N	\N
21	be220d8b-bffc-42a4-a073-9c886e6fe79f	en	Chinese Indie Brand	\N	\N
22	e8c88299-fa80-468a-a719-e86501237c88	en	h.NAOTO	\N	\N
23	6b0cb2ca-8f53-4320-b2d7-232c3e333497	en	MAXICIMAM	\N	\N
24	f454192f-93b8-4635-9409-b066c8d24c69	en	Cornet	\N	\N
25	66bc41c7-11f8-4dd2-a43c-8a0312d12a3f	en	Grimoire	\N	\N
26	5f422ee1-11b8-4593-a6d3-9eef471ae10e	en	Heart E	\N	\N
27	8025f54f-05a3-4ea5-bfa9-08dc4a4957f8	en	6%DOKIDOKI	\N	\N
28	d6702e87-d724-4b2f-9b2d-3a454d0f0dc3	en	Physical Drop	\N	\N
29	bc40549b-db09-4c03-8461-e5b37766009e	en	Millefleurs	\N	\N
30	68d9a41d-0297-4f01-96be-b2c6d2b359a1	en	Pink House	\N	\N
31	d7f9dfb9-49a1-475c-825a-6d49d7fe6af7	en	Vivienne Westwood	\N	\N
32	5aaa0ed0-7203-4ead-965c-46009ded4225	en	Haenuli	\N	\N
33	db054a75-a12c-49c3-b97d-7589f238b31e	en	SurfaceSpell	\N	\N
34	00d02505-12c9-4785-94f7-a57eacd70fd0	en	Enchantlic Enchantilly	\N	\N
35	3d36fee9-b2e6-4eae-a486-6f89b78306e4	en	Sheglit	\N	\N
36	dd82e2a2-8ed8-444f-a75f-85174eacfe71	en	MILK	\N	\N
37	7c476701-e8de-4c28-83bc-e70faef88256	en	Lief	\N	\N
38	7b0096c0-59f8-4e05-a80c-a7701639072d	en	Chess Story	\N	\N
39	5e5d054c-ddc1-49f4-8603-e8477a16049d	en	Krad Lanrete	\N	\N
40	1117e0da-4f1c-4300-a266-f78fcb4770cd	en	Offbrand	\N	\N
41	03eaf969-7a92-4696-8e3c-0957a1b6d56c	en	Infanta	\N	\N
42	8320e562-5f82-4582-a686-c6ead83d3ff0	en	Triple Fortune	\N	\N
43	e558195a-d023-4e09-9fa3-a3f71dcbb3d0	en	Baby Secret Love	\N	\N
44	ec0f1c3b-8199-487a-b90b-7e0334946ed8	en	MR	\N	\N
45	4997efc7-a6ab-49d3-8896-7358fac58b49	en	Shirley Temple	\N	\N
46	81f17db0-90b6-49a6-b251-3b9a96e031cf	en	Miho Matsuda	\N	\N
47	04952e3f-6aa5-4d8b-90f2-4eabb062dbb3	en	Leur Getter	\N	\N
48	3533676f-8dc0-4a70-8e3c-e7df2fa56494	en	Q-pot	\N	\N
49	fddff2c5-a4ab-4c29-bf57-6790c56ba0ad	en	Peppermint Fox	\N	\N
50	a382da1b-262f-4ff0-8f58-9e767dab4769	en	Soufflesong	\N	\N
51	116ca4dc-1e10-4290-b03d-37f72e4ceb73	en	Axes Femme	\N	\N
52	4ce98f2f-5d17-4fd0-9207-4445840ed215	en	Marble	\N	\N
53	66bd5ee8-d056-40d7-9d7b-3cde0d4c94dd	en	The Black Ribbon	\N	\N
54	b44f3f0b-4b2d-492b-84d5-104240faf30c	en	Wonderful World	\N	\N
163	00d02505-12c9-4785-94f7-a57eacd70fd0	fr	Enchantlic Enchantilly	\N	\N
164	03eaf969-7a92-4696-8e3c-0957a1b6d56c	fr	Infanta	\N	\N
165	04952e3f-6aa5-4d8b-90f2-4eabb062dbb3	fr	Leur Getter	\N	\N
166	0751c2d7-bc5b-4ec2-a69a-315cf8305162	fr	Antique Beast	\N	\N
167	0e29621e-5cd5-4814-957c-903808652c6c	fr	Baby, the Stars Shine Bright	\N	\N
168	1117e0da-4f1c-4300-a266-f78fcb4770cd	fr	Offbrand	\N	\N
169	116ca4dc-1e10-4290-b03d-37f72e4ceb73	fr	Axes Femme	\N	\N
170	1205a7b6-c82b-4744-baaf-4465be8317d7	fr	Atelier Pierrot	\N	\N
171	19cd58ae-7ea2-41f1-a145-9caf83cde401	fr	Juliette et Justine	\N	\N
172	1d849c42-a991-48e5-a1cc-dde246782651	fr	Innocent World	\N	\N
173	33378176-432a-4676-8f99-4e1167de9bdf	fr	Jane Marple	\N	\N
174	3533676f-8dc0-4a70-8e3c-e7df2fa56494	fr	Q-pot	\N	\N
175	3d36fee9-b2e6-4eae-a486-6f89b78306e4	fr	Sheglit	\N	\N
176	4997efc7-a6ab-49d3-8896-7358fac58b49	fr	Shirley Temple	\N	\N
177	4ce98f2f-5d17-4fd0-9207-4445840ed215	fr	Marble	\N	\N
178	4da985ce-4d52-40ad-ba7f-18d6650926bc	fr	Mary Magdalene	\N	\N
179	53da5b54-735a-4912-ae27-b1a0fc1659ff	fr	Moi-même-Moitié	\N	\N
180	5aaa0ed0-7203-4ead-965c-46009ded4225	fr	Haenuli	\N	\N
181	5e5d054c-ddc1-49f4-8603-e8477a16049d	fr	Krad Lanrete	\N	\N
182	5f422ee1-11b8-4593-a6d3-9eef471ae10e	fr	Heart E	\N	\N
183	642e97e5-2dd8-4a5f-bd54-c6ce7c846053	fr	Beth	\N	\N
184	66bc41c7-11f8-4dd2-a43c-8a0312d12a3f	fr	Grimoire	\N	\N
185	66bd5ee8-d056-40d7-9d7b-3cde0d4c94dd	fr	The Black Ribbon	\N	\N
186	7c476701-e8de-4c28-83bc-e70faef88256	fr	Lief	\N	\N
187	68d9a41d-0297-4f01-96be-b2c6d2b359a1	fr	Pink House	\N	\N
188	6b0cb2ca-8f53-4320-b2d7-232c3e333497	fr	MAXICIMAM	\N	\N
189	6ed4636f-561b-4161-ba78-14e58ca83ca2	fr	Black Peace Now	\N	\N
190	7b0096c0-59f8-4e05-a80c-a7701639072d	fr	Chess Story	\N	\N
191	8025f54f-05a3-4ea5-bfa9-08dc4a4957f8	fr	6%DOKIDOKI	\N	\N
192	81f17db0-90b6-49a6-b251-3b9a96e031cf	fr	Miho Matsuda	\N	\N
193	8320e562-5f82-4582-a686-c6ead83d3ff0	fr	Triple Fortune	\N	\N
194	8a4bfb01-81e7-4b19-994f-48b40716ea93	fr	Putumayo	\N	\N
195	8c0a5cd7-15a2-4c36-a59a-19062c1ceb9b	fr	Metamorphose Temps de Fille	\N	\N
196	9c9dab7d-cbe4-4817-8f0b-8f3a2001cac2	fr	Bodyline	\N	\N
197	a382da1b-262f-4ff0-8f58-9e767dab4769	fr	Soufflesong	\N	\N
198	b24938af-de30-4f81-8b57-c2192ca6c507	fr	Indie Brand	\N	\N
199	b44f3f0b-4b2d-492b-84d5-104240faf30c	fr	Wonderful World	\N	\N
200	bc40549b-db09-4c03-8461-e5b37766009e	fr	Millefleurs	\N	\N
201	be220d8b-bffc-42a4-a073-9c886e6fe79f	fr	Chinese Indie Brand	\N	\N
202	bf16c13c-1775-47c5-8d95-0c57895de258	fr	Excentrique	\N	\N
203	d6702e87-d724-4b2f-9b2d-3a454d0f0dc3	fr	Physical Drop	\N	\N
204	d6f7698e-bdf2-4b91-825b-4ebabbca75d0	fr	Alice and the Pirates	\N	\N
205	d7f9dfb9-49a1-475c-825a-6d49d7fe6af7	fr	Vivienne Westwood	\N	\N
206	db054a75-a12c-49c3-b97d-7589f238b31e	fr	SurfaceSpell	\N	\N
207	dd82e2a2-8ed8-444f-a75f-85174eacfe71	fr	MILK	\N	\N
208	e558195a-d023-4e09-9fa3-a3f71dcbb3d0	fr	Baby Secret Love	\N	\N
209	e8c88299-fa80-468a-a719-e86501237c88	fr	h.NAOTO	\N	\N
210	ec0f1c3b-8199-487a-b90b-7e0334946ed8	fr	MR	\N	\N
211	ecb829b3-8a9e-4348-8945-b985ede7f03a	fr	Angelic Pretty	\N	\N
212	ef5cf9ed-b62e-47fb-a2ed-ad25c3c35d17	fr	Victorian Maiden	\N	\N
213	ef82cf8e-38af-4ddc-8cf3-f43b1c3b29a1	fr	Emily Temple Cute	\N	\N
214	f454192f-93b8-4635-9409-b066c8d24c69	fr	Cornet	\N	\N
215	f60edf85-4466-4369-ae4a-753073f11b58	fr	Atelier Boz	\N	\N
216	fddff2c5-a4ab-4c29-bf57-6790c56ba0ad	fr	Peppermint Fox	\N	\N
217	00d02505-12c9-4785-94f7-a57eacd70fd0	nb_NO	Enchantlic Enchantilly	\N	\N
218	03eaf969-7a92-4696-8e3c-0957a1b6d56c	nb_NO	Infanta	\N	\N
219	0751c2d7-bc5b-4ec2-a69a-315cf8305162	nb_NO	Antique Beast	\N	\N
220	0e29621e-5cd5-4814-957c-903808652c6c	nb_NO	Baby, the Stars Shine Bright	\N	\N
221	04952e3f-6aa5-4d8b-90f2-4eabb062dbb3	nb_NO	Leur Getter	\N	\N
222	1117e0da-4f1c-4300-a266-f78fcb4770cd	nb_NO	Offbrand	\N	\N
223	116ca4dc-1e10-4290-b03d-37f72e4ceb73	nb_NO	Axes Femme	\N	\N
224	1205a7b6-c82b-4744-baaf-4465be8317d7	nb_NO	Atelier Pierrot	\N	\N
225	19cd58ae-7ea2-41f1-a145-9caf83cde401	nb_NO	Juliette et Justine	\N	\N
226	1d849c42-a991-48e5-a1cc-dde246782651	nb_NO	Innocent World	\N	\N
227	33378176-432a-4676-8f99-4e1167de9bdf	nb_NO	Jane Marple	\N	\N
228	3533676f-8dc0-4a70-8e3c-e7df2fa56494	nb_NO	Q-pot	\N	\N
229	3d36fee9-b2e6-4eae-a486-6f89b78306e4	nb_NO	Sheglit	\N	\N
230	4997efc7-a6ab-49d3-8896-7358fac58b49	nb_NO	Shirley Temple	\N	\N
231	4ce98f2f-5d17-4fd0-9207-4445840ed215	nb_NO	Marble	\N	\N
232	4da985ce-4d52-40ad-ba7f-18d6650926bc	nb_NO	Mary Magdalene	\N	\N
233	53da5b54-735a-4912-ae27-b1a0fc1659ff	nb_NO	Moi-même-Moitié	\N	\N
234	5aaa0ed0-7203-4ead-965c-46009ded4225	nb_NO	Haenuli	\N	\N
235	5e5d054c-ddc1-49f4-8603-e8477a16049d	nb_NO	Krad Lanrete	\N	\N
236	5f422ee1-11b8-4593-a6d3-9eef471ae10e	nb_NO	Heart E	\N	\N
237	642e97e5-2dd8-4a5f-bd54-c6ce7c846053	nb_NO	Beth	\N	\N
238	66bc41c7-11f8-4dd2-a43c-8a0312d12a3f	nb_NO	Grimoire	\N	\N
239	66bd5ee8-d056-40d7-9d7b-3cde0d4c94dd	nb_NO	The Black Ribbon	\N	\N
240	68d9a41d-0297-4f01-96be-b2c6d2b359a1	nb_NO	Pink House	\N	\N
241	6b0cb2ca-8f53-4320-b2d7-232c3e333497	nb_NO	MAXICIMAM	\N	\N
242	6ed4636f-561b-4161-ba78-14e58ca83ca2	nb_NO	Black Peace Now	\N	\N
243	7b0096c0-59f8-4e05-a80c-a7701639072d	nb_NO	Chess Story	\N	\N
244	7c476701-e8de-4c28-83bc-e70faef88256	nb_NO	Lief	\N	\N
245	8025f54f-05a3-4ea5-bfa9-08dc4a4957f8	nb_NO	6%DOKIDOKI	\N	\N
246	81f17db0-90b6-49a6-b251-3b9a96e031cf	nb_NO	Miho Matsuda	\N	\N
247	8320e562-5f82-4582-a686-c6ead83d3ff0	nb_NO	Triple Fortune	\N	\N
248	8a4bfb01-81e7-4b19-994f-48b40716ea93	nb_NO	Putumayo	\N	\N
249	8c0a5cd7-15a2-4c36-a59a-19062c1ceb9b	nb_NO	Metamorphose Temps de Fille	\N	\N
250	9c9dab7d-cbe4-4817-8f0b-8f3a2001cac2	nb_NO	Bodyline	\N	\N
251	a382da1b-262f-4ff0-8f58-9e767dab4769	nb_NO	Soufflesong	\N	\N
252	b24938af-de30-4f81-8b57-c2192ca6c507	nb_NO	Indie Brand	\N	\N
253	b44f3f0b-4b2d-492b-84d5-104240faf30c	nb_NO	Wonderful World	\N	\N
254	bc40549b-db09-4c03-8461-e5b37766009e	nb_NO	Millefleurs	\N	\N
255	be220d8b-bffc-42a4-a073-9c886e6fe79f	nb_NO	Chinese Indie Brand	\N	\N
256	bf16c13c-1775-47c5-8d95-0c57895de258	nb_NO	Excentrique	\N	\N
257	d6702e87-d724-4b2f-9b2d-3a454d0f0dc3	nb_NO	Physical Drop	\N	\N
258	d6f7698e-bdf2-4b91-825b-4ebabbca75d0	nb_NO	Alice and the Pirates	\N	\N
259	d7f9dfb9-49a1-475c-825a-6d49d7fe6af7	nb_NO	Vivienne Westwood	\N	\N
260	db054a75-a12c-49c3-b97d-7589f238b31e	nb_NO	SurfaceSpell	\N	\N
261	dd82e2a2-8ed8-444f-a75f-85174eacfe71	nb_NO	MILK	\N	\N
262	e558195a-d023-4e09-9fa3-a3f71dcbb3d0	nb_NO	Baby Secret Love	\N	\N
263	e8c88299-fa80-468a-a719-e86501237c88	nb_NO	h.NAOTO	\N	\N
264	ec0f1c3b-8199-487a-b90b-7e0334946ed8	nb_NO	MR	\N	\N
265	ecb829b3-8a9e-4348-8945-b985ede7f03a	nb_NO	Angelic Pretty	\N	\N
266	ef5cf9ed-b62e-47fb-a2ed-ad25c3c35d17	nb_NO	Victorian Maiden	\N	\N
267	ef82cf8e-38af-4ddc-8cf3-f43b1c3b29a1	nb_NO	Emily Temple Cute	\N	\N
268	f454192f-93b8-4635-9409-b066c8d24c69	nb_NO	Cornet	\N	\N
269	f60edf85-4466-4369-ae4a-753073f11b58	nb_NO	Atelier Boz	\N	\N
270	fddff2c5-a4ab-4c29-bf57-6790c56ba0ad	nb_NO	Peppermint Fox	\N	\N
271	8a4bfb01-81e7-4b19-994f-48b40716ea93	nl	Putumayo	\N	\N
272	8c0a5cd7-15a2-4c36-a59a-19062c1ceb9b	nl	Metamorphose Temps de Fille	\N	\N
273	9c9dab7d-cbe4-4817-8f0b-8f3a2001cac2	nl	Bodyline	\N	\N
274	a382da1b-262f-4ff0-8f58-9e767dab4769	nl	Soufflesong	\N	\N
275	b24938af-de30-4f81-8b57-c2192ca6c507	nl	Indie Brand	\N	\N
276	b44f3f0b-4b2d-492b-84d5-104240faf30c	nl	Wonderful World	\N	\N
277	ecb829b3-8a9e-4348-8945-b985ede7f03a	nl	Angelic Pretty	\N	\N
278	00d02505-12c9-4785-94f7-a57eacd70fd0	nl	Enchantlic Enchantilly	\N	\N
279	03eaf969-7a92-4696-8e3c-0957a1b6d56c	nl	Infanta	\N	\N
280	04952e3f-6aa5-4d8b-90f2-4eabb062dbb3	nl	Leur Getter	\N	\N
281	0751c2d7-bc5b-4ec2-a69a-315cf8305162	nl	Antique Beast	\N	\N
282	0e29621e-5cd5-4814-957c-903808652c6c	nl	Baby, the Stars Shine Bright	\N	\N
283	1117e0da-4f1c-4300-a266-f78fcb4770cd	nl	Merkloos	\N	\N
284	116ca4dc-1e10-4290-b03d-37f72e4ceb73	nl	Axes Femme	\N	\N
285	1205a7b6-c82b-4744-baaf-4465be8317d7	nl	Atelier Pierrot	\N	\N
286	19cd58ae-7ea2-41f1-a145-9caf83cde401	nl	Juliette et Justine	\N	\N
287	1d849c42-a991-48e5-a1cc-dde246782651	nl	Innocent World	\N	\N
288	53da5b54-735a-4912-ae27-b1a0fc1659ff	nl	Moi-même-Moitié	\N	\N
289	5aaa0ed0-7203-4ead-965c-46009ded4225	nl	Haenuli	\N	\N
290	5e5d054c-ddc1-49f4-8603-e8477a16049d	nl	Krad Lanrete	\N	\N
291	5f422ee1-11b8-4593-a6d3-9eef471ae10e	nl	Heart E	\N	\N
292	642e97e5-2dd8-4a5f-bd54-c6ce7c846053	nl	Beth	\N	\N
293	66bc41c7-11f8-4dd2-a43c-8a0312d12a3f	nl	Grimoire	\N	\N
294	66bd5ee8-d056-40d7-9d7b-3cde0d4c94dd	nl	The Black Ribbon	\N	\N
295	68d9a41d-0297-4f01-96be-b2c6d2b359a1	nl	Pink House	\N	\N
296	6b0cb2ca-8f53-4320-b2d7-232c3e333497	nl	MAXICIMAM	\N	\N
297	6ed4636f-561b-4161-ba78-14e58ca83ca2	nl	Black Peace Now	\N	\N
298	7b0096c0-59f8-4e05-a80c-a7701639072d	nl	Chess Story	\N	\N
299	7c476701-e8de-4c28-83bc-e70faef88256	nl	Lief	\N	\N
300	33378176-432a-4676-8f99-4e1167de9bdf	nl	Jane Marple	\N	\N
301	3533676f-8dc0-4a70-8e3c-e7df2fa56494	nl	Q-pot	\N	\N
302	3d36fee9-b2e6-4eae-a486-6f89b78306e4	nl	Sheglit	\N	\N
303	4997efc7-a6ab-49d3-8896-7358fac58b49	nl	Shirley Temple	\N	\N
304	4ce98f2f-5d17-4fd0-9207-4445840ed215	nl	Marble	\N	\N
305	4da985ce-4d52-40ad-ba7f-18d6650926bc	nl	Mary Magdalene	\N	\N
306	8025f54f-05a3-4ea5-bfa9-08dc4a4957f8	nl	6%DOKIDOKI	\N	\N
307	81f17db0-90b6-49a6-b251-3b9a96e031cf	nl	Miho Matsuda	\N	\N
308	d6702e87-d724-4b2f-9b2d-3a454d0f0dc3	nl	Physical Drop	\N	\N
309	d6f7698e-bdf2-4b91-825b-4ebabbca75d0	nl	Alice and the Pirates	\N	\N
310	d7f9dfb9-49a1-475c-825a-6d49d7fe6af7	nl	Vivienne Westwood	\N	\N
311	8320e562-5f82-4582-a686-c6ead83d3ff0	nl	Triple Fortune	\N	\N
312	bc40549b-db09-4c03-8461-e5b37766009e	nl	Millefleurs	\N	\N
313	be220d8b-bffc-42a4-a073-9c886e6fe79f	nl	Chinees Indie Brand	\N	\N
314	bf16c13c-1775-47c5-8d95-0c57895de258	nl	Excentrique	\N	\N
315	db054a75-a12c-49c3-b97d-7589f238b31e	nl	SurfaceSpell	\N	\N
316	dd82e2a2-8ed8-444f-a75f-85174eacfe71	nl	MILK	\N	\N
317	e558195a-d023-4e09-9fa3-a3f71dcbb3d0	nl	Baby Secret Love	\N	\N
318	e8c88299-fa80-468a-a719-e86501237c88	nl	h.NAOTO	\N	\N
319	f454192f-93b8-4635-9409-b066c8d24c69	nl	Cornet	\N	\N
320	f60edf85-4466-4369-ae4a-753073f11b58	nl	Atelier Boz	\N	\N
321	ec0f1c3b-8199-487a-b90b-7e0334946ed8	nl	MR	\N	\N
322	ef5cf9ed-b62e-47fb-a2ed-ad25c3c35d17	nl	Victorian Maiden	\N	\N
323	ef82cf8e-38af-4ddc-8cf3-f43b1c3b29a1	nl	Emily Temple Cute	\N	\N
324	fddff2c5-a4ab-4c29-bf57-6790c56ba0ad	nl	Peppermint Fox	\N	\N
433	1d849c42-a991-48e5-a1cc-dde246782651	it	Innocent World	\N	\N
434	33378176-432a-4676-8f99-4e1167de9bdf	it	Jane Marple	\N	\N
435	3533676f-8dc0-4a70-8e3c-e7df2fa56494	it	Q-pot	\N	\N
436	00d02505-12c9-4785-94f7-a57eacd70fd0	it	Enchantlic Enchantilly	\N	\N
437	03eaf969-7a92-4696-8e3c-0957a1b6d56c	it	Infanta	\N	\N
438	04952e3f-6aa5-4d8b-90f2-4eabb062dbb3	it	Leur Getter	\N	\N
439	0751c2d7-bc5b-4ec2-a69a-315cf8305162	it	Antique Beast	\N	\N
440	0e29621e-5cd5-4814-957c-903808652c6c	it	Baby, the Stars Shine Bright	\N	\N
441	1117e0da-4f1c-4300-a266-f78fcb4770cd	it	Non di marca	\N	\N
442	116ca4dc-1e10-4290-b03d-37f72e4ceb73	it	Axes Femme	\N	\N
443	1205a7b6-c82b-4744-baaf-4465be8317d7	it	Atelier Pierrot	\N	\N
444	19cd58ae-7ea2-41f1-a145-9caf83cde401	it	Juliette et Justine	\N	\N
445	3d36fee9-b2e6-4eae-a486-6f89b78306e4	it	Sheglit	\N	\N
446	4997efc7-a6ab-49d3-8896-7358fac58b49	it	Shirley Temple	\N	\N
447	4ce98f2f-5d17-4fd0-9207-4445840ed215	it	Marble	\N	\N
448	4da985ce-4d52-40ad-ba7f-18d6650926bc	it	Mary Magdalene	\N	\N
449	53da5b54-735a-4912-ae27-b1a0fc1659ff	it	Moi-même-Moitié	\N	\N
450	5aaa0ed0-7203-4ead-965c-46009ded4225	it	Haenuli	\N	\N
451	5e5d054c-ddc1-49f4-8603-e8477a16049d	it	Krad Lanrete	\N	\N
452	5f422ee1-11b8-4593-a6d3-9eef471ae10e	it	Heart E	\N	\N
453	642e97e5-2dd8-4a5f-bd54-c6ce7c846053	it	Beth	\N	\N
454	66bc41c7-11f8-4dd2-a43c-8a0312d12a3f	it	Grimoire	\N	\N
455	66bd5ee8-d056-40d7-9d7b-3cde0d4c94dd	it	The Black Ribbon	\N	\N
456	68d9a41d-0297-4f01-96be-b2c6d2b359a1	it	Pink House	\N	\N
457	6b0cb2ca-8f53-4320-b2d7-232c3e333497	it	MAXICIMAM	\N	\N
458	6ed4636f-561b-4161-ba78-14e58ca83ca2	it	Black Peace Now	\N	\N
459	7b0096c0-59f8-4e05-a80c-a7701639072d	it	Chess Story	\N	\N
460	7c476701-e8de-4c28-83bc-e70faef88256	it	Lief	\N	\N
461	8025f54f-05a3-4ea5-bfa9-08dc4a4957f8	it	6%DOKIDOKI	\N	\N
462	81f17db0-90b6-49a6-b251-3b9a96e031cf	it	Miho Matsuda	\N	\N
463	9c9dab7d-cbe4-4817-8f0b-8f3a2001cac2	it	Bodyline	\N	\N
464	8320e562-5f82-4582-a686-c6ead83d3ff0	it	Triple Fortune	\N	\N
465	8a4bfb01-81e7-4b19-994f-48b40716ea93	it	Putumayo	\N	\N
466	8c0a5cd7-15a2-4c36-a59a-19062c1ceb9b	it	Metamorphose Temps de Fille	\N	\N
467	a382da1b-262f-4ff0-8f58-9e767dab4769	it	Soufflesong	\N	\N
468	b24938af-de30-4f81-8b57-c2192ca6c507	it	Brand Indie	\N	\N
469	b44f3f0b-4b2d-492b-84d5-104240faf30c	it	Wonderful World	\N	\N
470	bc40549b-db09-4c03-8461-e5b37766009e	it	Millefleurs	\N	\N
471	be220d8b-bffc-42a4-a073-9c886e6fe79f	it	Brand Indie Cinese	\N	\N
472	bf16c13c-1775-47c5-8d95-0c57895de258	it	Excentrique	\N	\N
473	d6702e87-d724-4b2f-9b2d-3a454d0f0dc3	it	Physical Drop	\N	\N
474	d6f7698e-bdf2-4b91-825b-4ebabbca75d0	it	Alice and the Pirates	\N	\N
475	d7f9dfb9-49a1-475c-825a-6d49d7fe6af7	it	Vivienne Westwood	\N	\N
476	db054a75-a12c-49c3-b97d-7589f238b31e	it	SurfaceSpell	\N	\N
477	dd82e2a2-8ed8-444f-a75f-85174eacfe71	it	MILK	\N	\N
478	e558195a-d023-4e09-9fa3-a3f71dcbb3d0	it	Baby Secret Love	\N	\N
479	e8c88299-fa80-468a-a719-e86501237c88	it	h.NAOTO	\N	\N
480	ec0f1c3b-8199-487a-b90b-7e0334946ed8	it	MR	\N	\N
481	f454192f-93b8-4635-9409-b066c8d24c69	it	Cornet	\N	\N
482	ecb829b3-8a9e-4348-8945-b985ede7f03a	it	Angelic Pretty	\N	\N
483	ef5cf9ed-b62e-47fb-a2ed-ad25c3c35d17	it	Victorian Maiden	\N	\N
484	f60edf85-4466-4369-ae4a-753073f11b58	it	Atelier Boz	\N	\N
485	ef82cf8e-38af-4ddc-8cf3-f43b1c3b29a1	it	Emily Temple Cute	\N	\N
486	fddff2c5-a4ab-4c29-bf57-6790c56ba0ad	it	Peppermint Fox	\N	\N
595	9b6888bf-0302-432f-82c2-451b3f1d47d9	en	Royal Princess Alice	2023-11-18 00:25:00+00	2023-11-18 00:25:00+00
597	0d3ba807-9720-4c13-8d6b-e971f8600629	en	Lady Sloth	2024-02-14 02:16:22+00	2024-02-14 02:16:22+00
599	0d3ba807-9720-4c13-8d6b-e971f8600629	fr	Lady Sloth	2024-02-14 02:16:22+00	2024-02-14 02:16:22+00
600	0d3ba807-9720-4c13-8d6b-e971f8600629	it	Lady Sloth	2024-02-14 02:16:22+00	2024-02-14 02:16:22+00
601	0d3ba807-9720-4c13-8d6b-e971f8600629	nb_NO	Lady Sloth	2024-02-14 02:16:22+00	2024-02-14 02:16:22+00
602	0d3ba807-9720-4c13-8d6b-e971f8600629	nl	Lady Sloth	2024-02-14 02:16:22+00	2024-02-14 02:16:22+00
603	a19d0347-a7a5-45f0-ae5d-8455b1a4ede2	en	Melody BasKet	2024-02-23 00:43:29+00	2024-02-23 00:43:29+00
605	a19d0347-a7a5-45f0-ae5d-8455b1a4ede2	fr	Melody BasKet	2024-02-23 00:43:29+00	2024-02-23 00:43:29+00
606	a19d0347-a7a5-45f0-ae5d-8455b1a4ede2	it	Melody BasKet	2024-02-23 00:43:29+00	2024-02-23 00:43:29+00
607	a19d0347-a7a5-45f0-ae5d-8455b1a4ede2	nb_NO	Melody BasKet	2024-02-23 00:43:29+00	2024-02-23 00:43:29+00
608	a19d0347-a7a5-45f0-ae5d-8455b1a4ede2	nl	Melody BasKet	2024-02-23 00:43:29+00	2024-02-23 00:43:29+00
609	550f8311-8c5b-4c1a-9c2a-8f5a89f09d1a	en	Hiroko Tokumine	2024-03-14 14:54:04+00	2024-03-14 14:54:04+00
610	550f8311-8c5b-4c1a-9c2a-8f5a89f09d1a	fr	Hiroko Tokumine	2024-03-14 14:54:04+00	2024-03-14 14:54:04+00
611	550f8311-8c5b-4c1a-9c2a-8f5a89f09d1a	it	Hiroko Tokumine	2024-03-14 14:54:04+00	2024-03-14 14:54:04+00
612	550f8311-8c5b-4c1a-9c2a-8f5a89f09d1a	nb_NO	Hiroko Tokumine	2024-03-14 14:54:04+00	2024-03-14 14:54:04+00
613	550f8311-8c5b-4c1a-9c2a-8f5a89f09d1a	nl	Hiroko Tokumine	2024-03-14 14:54:04+00	2024-03-14 14:54:04+00
614	f404066a-fa60-4a5f-a42c-87269795d63e	en	Belladonna	2024-06-25 05:21:24+00	2024-06-25 05:21:24+00
615	f404066a-fa60-4a5f-a42c-87269795d63e	fr	Belladonna	2024-06-25 05:21:24+00	2024-06-25 05:21:24+00
616	f404066a-fa60-4a5f-a42c-87269795d63e	it	Belladonna	2024-06-25 05:21:24+00	2024-06-25 05:21:24+00
617	f404066a-fa60-4a5f-a42c-87269795d63e	nb_NO	Belladonna	2024-06-25 05:21:24+00	2024-06-25 05:21:24+00
618	f404066a-fa60-4a5f-a42c-87269795d63e	nl	Belladonna	2024-06-25 05:21:24+00	2024-07-02 23:29:12+00
620	a7cedc40-026d-40f8-9196-72d6453e32bc	en	Anna House	2024-09-03 20:41:32+00	2024-09-03 20:41:32+00
621	a7cedc40-026d-40f8-9196-72d6453e32bc	fr	Anna House	2024-09-03 20:41:32+00	2024-09-03 20:41:32+00
622	a7cedc40-026d-40f8-9196-72d6453e32bc	it	Anna House	2024-09-03 20:41:32+00	2024-09-03 20:41:32+00
623	a7cedc40-026d-40f8-9196-72d6453e32bc	nb_NO	Anna House	2024-09-03 20:41:32+00	2024-09-03 20:41:32+00
624	a7cedc40-026d-40f8-9196-72d6453e32bc	nl	Anna House	2024-09-03 20:41:32+00	2024-09-03 20:41:32+00
625	5f8425de-06c8-4fa1-8cd8-4c0850200ac7	en	WireHead	2024-09-03 21:03:03+00	2024-09-03 21:03:03+00
626	5f8425de-06c8-4fa1-8cd8-4c0850200ac7	fr	WireHead	2024-09-03 21:03:03+00	2024-09-03 21:03:03+00
627	5f8425de-06c8-4fa1-8cd8-4c0850200ac7	it	WireHead	2024-09-03 21:03:03+00	2024-09-03 21:03:03+00
628	5f8425de-06c8-4fa1-8cd8-4c0850200ac7	nb_NO	WireHead	2024-09-03 21:03:03+00	2024-09-03 21:03:03+00
629	5f8425de-06c8-4fa1-8cd8-4c0850200ac7	nl	WireHead	2024-09-03 21:03:03+00	2024-09-03 21:03:03+00
630	4c773d98-4211-40b7-8243-1a286e3dc80f	en	Dear Celine	2024-09-04 00:29:18+00	2024-09-04 00:29:18+00
631	4c773d98-4211-40b7-8243-1a286e3dc80f	fr	Dear Celine	2024-09-04 00:29:18+00	2024-09-04 00:29:18+00
632	4c773d98-4211-40b7-8243-1a286e3dc80f	it	Dear Celine	2024-09-04 00:29:18+00	2024-09-04 00:29:18+00
633	4c773d98-4211-40b7-8243-1a286e3dc80f	nb_NO	Dear Celine	2024-09-04 00:29:18+00	2024-09-04 00:29:18+00
634	4c773d98-4211-40b7-8243-1a286e3dc80f	nl	Dear Celine	2024-09-04 00:29:18+00	2024-09-04 00:29:18+00
635	ca0339b4-02a3-4b3d-9da4-2863e1a48ffd	en	Na+H	2025-05-28 16:07:28+00	2025-05-28 16:12:27+00
636	ca0339b4-02a3-4b3d-9da4-2863e1a48ffd	fr	Na+H	2025-05-28 16:07:28+00	2025-05-28 16:12:27+00
637	ca0339b4-02a3-4b3d-9da4-2863e1a48ffd	it	Na+H	2025-05-28 16:07:28+00	2025-05-28 16:12:27+00
638	ca0339b4-02a3-4b3d-9da4-2863e1a48ffd	nb_NO	Na+H	2025-05-28 16:07:28+00	2025-05-28 16:12:27+00
639	ca0339b4-02a3-4b3d-9da4-2863e1a48ffd	nl	Na+H	2025-05-28 16:07:28+00	2025-05-28 16:12:27+00
645	439dee8a-5ef7-4c18-9375-6c74cd294030	en	Chocochip Cookie	2026-01-06 01:09:05+00	2026-01-06 01:09:05+00
646	439dee8a-5ef7-4c18-9375-6c74cd294030	fr	Chocochip Cookie	2026-01-06 01:09:05+00	2026-01-06 01:09:05+00
647	439dee8a-5ef7-4c18-9375-6c74cd294030	it	Chocochip Cookie	2026-01-06 01:09:05+00	2026-01-06 01:09:05+00
648	439dee8a-5ef7-4c18-9375-6c74cd294030	nb_NO	Chocochip Cookie	2026-01-06 01:09:06+00	2026-01-06 01:09:06+00
649	439dee8a-5ef7-4c18-9375-6c74cd294030	nl	Chocochip Cookie	2026-01-06 01:09:06+00	2026-01-06 01:09:06+00
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.categories (id, slug, created_at, updated_at, image) FROM stdin;
3da3a1c0-2d58-4a69-be39-666c7c4646ab	jsk	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/jsk.svg
835a990c-9a7c-4a14-9fd0-893647111e43	hair-accessories	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/hair-accessories.svg
146cd101-9c8b-4999-b564-acc1e2915bb4	skirt	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/skirt.svg
0b1919d0-64a3-46f7-8ff4-b94f4da41131	sets	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/sets.svg
f93b4b74-9cac-4710-bf99-1947f491f035	op	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/op.svg
9c4c1c5f-a312-472f-8364-3b3df212a8dd	blouse	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/blouse.svg
820c8f2d-ce76-4cb9-b2d5-82f24640fe60	jewelry	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/jewelry.svg
5287e746-4b9b-44ca-9c6f-09efee95173a	bags	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/bags.svg
7a4348c9-e489-4a28-9590-221de863ec44	coats	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/coats.svg
ca5f50b3-3555-4957-8b9c-a0e4e5084066	bolero	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/bolero.svg
f583db67-75ed-4665-a7ef-3b08ee85d73b	pants	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/pants.svg
90f54b22-9016-4892-87ff-05d1f9e67807	salopette	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/salopette.svg
59fa782d-1a79-4d25-8557-1a6301c04981	other	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/other.svg
697d4051-16cb-420e-ac5a-f63729a06fcd	cardigan	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/cardigan.svg
9c32c4e7-299c-48b4-b530-c2c22f696888	accessories	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/accessories.svg
f95079db-6f4e-4678-8c22-1b07405672d2	corsetbustier	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/corsetbustier.svg
a9eacacd-a626-494f-8940-ff10ea22eb0c	cape	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/cape.svg
6fa1c61e-ee2a-4e61-b8ce-ff78b72e5c59	vest	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/vest.svg
46ccb1ff-b607-4492-9a28-cddd778b319c	petticoat	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/petticoat.svg
bde69ada-c7a8-4069-875e-ef73f379e1d7	cutsew	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00	categories/cutsew.svg
36b221b0-aa63-469b-ac99-bcd17dca527c	shoes	2017-08-17 11:15:40+00	2017-08-17 11:15:40+00	categories/shoes.svg
0ee298f2-3fcc-4a0a-b580-163cef338d06	umbrellas-parasols	2017-03-20 09:29:51+00	2019-12-20 19:57:50+00	categories/parasols.svg
d3764f5a-d63e-4fdc-944a-4c56e563c1ca	bloomers	2017-03-20 09:29:51+00	2020-03-22 15:55:50+00	categories/bloomers.svg
c8936a0d-d2ca-4149-a98f-1c2516f82927	socks	2017-03-20 09:29:51+00	2020-03-22 15:56:06+00	categories/socks.svg
d436ceac-5c77-4fee-baf5-9c666de1d1d1	apron	2020-12-08 23:36:33+00	2020-12-08 23:36:33+00	categories/TYg3YIXNd4HzQnsuiUb2HGicD4Snf6tO9xtVcVyY.svg
125076bf-74f9-4dae-a6b5-7d83484ced7b	publications	2022-07-23 20:40:00+00	2022-07-23 20:44:28+00	categories/SBIryXN0Qkf2xIhRa8tC1Qg9KwEj9wiWzXgrvEPV.svg
\.


--
-- Data for Name: category_translations; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.category_translations (id, category_id, locale, name, created_at, updated_at) FROM stdin;
1	3da3a1c0-2d58-4a69-be39-666c7c4646ab	en	JSK	\N	\N
2	835a990c-9a7c-4a14-9fd0-893647111e43	en	Hair Accessories	\N	\N
3	146cd101-9c8b-4999-b564-acc1e2915bb4	en	Skirt	\N	\N
4	0b1919d0-64a3-46f7-8ff4-b94f4da41131	en	Sets	\N	\N
5	f93b4b74-9cac-4710-bf99-1947f491f035	en	OP	\N	\N
6	9c4c1c5f-a312-472f-8364-3b3df212a8dd	en	Blouse	\N	\N
7	820c8f2d-ce76-4cb9-b2d5-82f24640fe60	en	Jewelry	\N	\N
8	5287e746-4b9b-44ca-9c6f-09efee95173a	en	Bags	\N	\N
10	ca5f50b3-3555-4957-8b9c-a0e4e5084066	en	Bolero	\N	\N
11	f583db67-75ed-4665-a7ef-3b08ee85d73b	en	Pants	\N	\N
12	90f54b22-9016-4892-87ff-05d1f9e67807	en	Salopette	\N	\N
14	59fa782d-1a79-4d25-8557-1a6301c04981	en	Other	\N	\N
15	697d4051-16cb-420e-ac5a-f63729a06fcd	en	Cardigan	\N	\N
16	9c32c4e7-299c-48b4-b530-c2c22f696888	en	Accessories	\N	\N
17	f95079db-6f4e-4678-8c22-1b07405672d2	en	Corset/Bustier	\N	\N
18	a9eacacd-a626-494f-8940-ff10ea22eb0c	en	Cape	\N	\N
19	6fa1c61e-ee2a-4e61-b8ce-ff78b72e5c59	en	Vest	\N	\N
20	46ccb1ff-b607-4492-9a28-cddd778b319c	en	Petticoat	\N	\N
21	bde69ada-c7a8-4069-875e-ef73f379e1d7	en	Cutsew	\N	\N
22	36b221b0-aa63-469b-ac99-bcd17dca527c	en	Shoes	\N	\N
23	0ee298f2-3fcc-4a0a-b580-163cef338d06	en	Umbrellas/Parasols	\N	\N
25	c8936a0d-d2ca-4149-a98f-1c2516f82927	en	Socks/Tights	\N	\N
26	d436ceac-5c77-4fee-baf5-9c666de1d1d1	en	Apron	\N	\N
27	125076bf-74f9-4dae-a6b5-7d83484ced7b	en	Publications	\N	\N
55	a9eacacd-a626-494f-8940-ff10ea22eb0c	fr	Cape	\N	\N
56	125076bf-74f9-4dae-a6b5-7d83484ced7b	fr	Ouvrages	\N	\N
57	835a990c-9a7c-4a14-9fd0-893647111e43	fr	Accessoires de tête	\N	\N
58	f95079db-6f4e-4678-8c22-1b07405672d2	fr	Corcet/Bustier	\N	\N
60	bde69ada-c7a8-4069-875e-ef73f379e1d7	fr	Cutsew	\N	\N
61	46ccb1ff-b607-4492-9a28-cddd778b319c	fr	Jupon	\N	\N
62	6fa1c61e-ee2a-4e61-b8ce-ff78b72e5c59	fr	Veston	\N	\N
63	697d4051-16cb-420e-ac5a-f63729a06fcd	fr	Gilet	\N	\N
64	9c4c1c5f-a312-472f-8364-3b3df212a8dd	fr	Chemisier/Blouse	\N	\N
65	9c32c4e7-299c-48b4-b530-c2c22f696888	fr	Accesoires	\N	\N
66	ca5f50b3-3555-4957-8b9c-a0e4e5084066	fr	Boléro	\N	\N
67	59fa782d-1a79-4d25-8557-1a6301c04981	fr	Autre	\N	\N
69	d436ceac-5c77-4fee-baf5-9c666de1d1d1	fr	Tablier	\N	\N
70	c8936a0d-d2ca-4149-a98f-1c2516f82927	fr	Chaussettes/collants	\N	\N
71	3da3a1c0-2d58-4a69-be39-666c7c4646ab	fr	JSK (robe sans manches)	\N	\N
72	0ee298f2-3fcc-4a0a-b580-163cef338d06	fr	Ombrelles/Parapluies	\N	\N
73	90f54b22-9016-4892-87ff-05d1f9e67807	fr	Salopette	\N	\N
74	f583db67-75ed-4665-a7ef-3b08ee85d73b	fr	Pantalon	\N	\N
75	146cd101-9c8b-4999-b564-acc1e2915bb4	fr	Jupe	\N	\N
76	36b221b0-aa63-469b-ac99-bcd17dca527c	fr	Chaussures	\N	\N
77	7a4348c9-e489-4a28-9590-221de863ec44	fr	Manteaux	\N	\N
78	5287e746-4b9b-44ca-9c6f-09efee95173a	fr	Sacs	\N	\N
79	820c8f2d-ce76-4cb9-b2d5-82f24640fe60	fr	Bijoux	\N	\N
80	0b1919d0-64a3-46f7-8ff4-b94f4da41131	fr	Assortiments/Sets	\N	\N
81	f93b4b74-9cac-4710-bf99-1947f491f035	fr	OP	\N	\N
136	a9eacacd-a626-494f-8940-ff10ea22eb0c	nl	Cape	\N	\N
137	125076bf-74f9-4dae-a6b5-7d83484ced7b	nl	Publicaties	\N	\N
138	835a990c-9a7c-4a14-9fd0-893647111e43	nl	Haaraccessoires	\N	\N
139	f95079db-6f4e-4678-8c22-1b07405672d2	nl	Korset/Bustier	\N	\N
141	bde69ada-c7a8-4069-875e-ef73f379e1d7	nl	Cutsew	\N	\N
142	46ccb1ff-b607-4492-9a28-cddd778b319c	nl	Petticoat	\N	\N
143	6fa1c61e-ee2a-4e61-b8ce-ff78b72e5c59	nl	Gilet	\N	\N
144	697d4051-16cb-420e-ac5a-f63729a06fcd	nl	Vest	\N	\N
145	9c4c1c5f-a312-472f-8364-3b3df212a8dd	nl	Blouse	\N	\N
146	9c32c4e7-299c-48b4-b530-c2c22f696888	nl	Accessoires	\N	\N
147	ca5f50b3-3555-4957-8b9c-a0e4e5084066	nl	Bolero	\N	\N
148	59fa782d-1a79-4d25-8557-1a6301c04981	nl	Anders	\N	\N
150	d436ceac-5c77-4fee-baf5-9c666de1d1d1	nl	Schort	\N	\N
151	c8936a0d-d2ca-4149-a98f-1c2516f82927	nl	Sokken/Panty's	\N	\N
152	3da3a1c0-2d58-4a69-be39-666c7c4646ab	nl	JSK	\N	\N
153	0ee298f2-3fcc-4a0a-b580-163cef338d06	nl	Paraplu's/Parasols	\N	\N
154	90f54b22-9016-4892-87ff-05d1f9e67807	nl	Salopette	\N	\N
155	f583db67-75ed-4665-a7ef-3b08ee85d73b	nl	Broek	\N	\N
156	146cd101-9c8b-4999-b564-acc1e2915bb4	nl	Rok	\N	\N
157	36b221b0-aa63-469b-ac99-bcd17dca527c	nl	Schoenen	\N	\N
158	7a4348c9-e489-4a28-9590-221de863ec44	nl	Jassen	\N	\N
159	5287e746-4b9b-44ca-9c6f-09efee95173a	nl	Tassen	\N	\N
160	820c8f2d-ce76-4cb9-b2d5-82f24640fe60	nl	Sieraden	\N	\N
161	0b1919d0-64a3-46f7-8ff4-b94f4da41131	nl	Setjes	\N	\N
162	f93b4b74-9cac-4710-bf99-1947f491f035	nl	OP	\N	\N
217	a9eacacd-a626-494f-8940-ff10ea22eb0c	it	Mantello	\N	\N
218	59fa782d-1a79-4d25-8557-1a6301c04981	it	Altro	\N	\N
219	146cd101-9c8b-4999-b564-acc1e2915bb4	it	Gonna	\N	\N
220	36b221b0-aa63-469b-ac99-bcd17dca527c	it	Scarpe	\N	\N
221	0b1919d0-64a3-46f7-8ff4-b94f4da41131	it	Set	\N	\N
222	0ee298f2-3fcc-4a0a-b580-163cef338d06	it	Ombrelli/Parasole	\N	\N
223	835a990c-9a7c-4a14-9fd0-893647111e43	it	Accessori per Capelli	\N	\N
224	5287e746-4b9b-44ca-9c6f-09efee95173a	it	Borse	\N	\N
225	f95079db-6f4e-4678-8c22-1b07405672d2	it	Corsetto/Bustino	\N	\N
227	bde69ada-c7a8-4069-875e-ef73f379e1d7	it	Cutsew	\N	\N
228	697d4051-16cb-420e-ac5a-f63729a06fcd	it	Cardigan	\N	\N
229	3da3a1c0-2d58-4a69-be39-666c7c4646ab	it	JSK	\N	\N
230	d3764f5a-d63e-4fdc-944a-4c56e563c1ca	it	Bloomer/Indumenti Intimi	\N	\N
231	9c32c4e7-299c-48b4-b530-c2c22f696888	it	Accessori	\N	\N
232	90f54b22-9016-4892-87ff-05d1f9e67807	it	Salopette	\N	\N
233	125076bf-74f9-4dae-a6b5-7d83484ced7b	it	Pubblicazioni	\N	\N
234	c8936a0d-d2ca-4149-a98f-1c2516f82927	it	Calze	\N	\N
235	820c8f2d-ce76-4cb9-b2d5-82f24640fe60	it	Gioielli	\N	\N
236	7a4348c9-e489-4a28-9590-221de863ec44	it	Cappotti	\N	\N
237	9c4c1c5f-a312-472f-8364-3b3df212a8dd	it	Bluse	\N	\N
238	46ccb1ff-b607-4492-9a28-cddd778b319c	it	Sottogonna	\N	\N
239	d436ceac-5c77-4fee-baf5-9c666de1d1d1	it	Grembiule	\N	\N
240	6fa1c61e-ee2a-4e61-b8ce-ff78b72e5c59	it	Smanicato	\N	\N
241	ca5f50b3-3555-4957-8b9c-a0e4e5084066	it	Bolero	\N	\N
242	f93b4b74-9cac-4710-bf99-1947f491f035	it	OP	\N	\N
243	f583db67-75ed-4665-a7ef-3b08ee85d73b	it	Pantaloni	\N	\N
24	d3764f5a-d63e-4fdc-944a-4c56e563c1ca	en	Bloomers/​Undergarments	\N	2024-06-20 13:45:44+00
68	d3764f5a-d63e-4fdc-944a-4c56e563c1ca	fr	Bloomers/​Sous-vêtements	\N	2024-06-20 13:46:57+00
149	d3764f5a-d63e-4fdc-944a-4c56e563c1ca	nl	Bloomers/​Onderkleding	\N	2024-06-20 13:46:57+00
9	7a4348c9-e489-4a28-9590-221de863ec44	en	Coat/Jacket	\N	2026-06-10 03:04:18+00
\.


--
-- Data for Name: colors; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.colors (id, slug, created_at, updated_at) FROM stdin;
480112b1-5c69-494c-92fe-5074b078fd61	black	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
01c5418e-b4a6-46e6-8b3b-5c208e1b5232	pink	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
6ea2597b-4c5b-4988-9695-b867b4f12014	offwhite	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
c78ab9b5-9b49-4d61-8040-e0b181179ca6	ivory	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
81448b74-56a4-431f-a1bf-f763f73665fa	navy	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
ef1cf482-5ddc-4f15-8548-3df03fe7ee90	brown	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
e6a00b63-e173-48b4-ad20-dbbc0716eced	red	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
82a10bf0-ed01-47bb-b426-02cb2528403e	winebordeaux	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
3a547686-d0fb-483a-bfc6-ec6d6ac3df29	sax	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
ac470398-8ca1-4cf3-a12b-221783058fae	blue	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
78e79ff0-f34f-4a8a-8e59-42908e19e2d4	beige	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
fefee163-372c-4911-abb2-90369443025a	lavender	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
358ad676-0490-4379-8e31-246113ff0f1d	green	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
095dad29-3e3d-43e8-aeaf-dc9b4c70c1f3	mint	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
150c5a2d-096a-4aaa-8802-c240e6e0c0f6	black-x-white	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
ea28e93d-00d4-44f2-81c6-ab0b3e716488	gray	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
a3aa88d6-9587-463f-9e28-3e4d0a9998dd	black-x-offwhite	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
83458461-6784-43c6-b135-b30a5719b6d0	yellow	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
9b78bfc6-f398-4e67-a716-a2587de5c2e9	purple	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
96db0661-4119-4c1b-87fd-106cb3a8c2ef	rose	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
d40726c6-3e74-47af-8367-c57cfae79416	pink-x-offwhite	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
455d08e3-b871-459f-8b11-33235735ac55	cream	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
cabbd55f-c407-412b-a953-18cca0eca6b3	gold	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
28770e8e-e92e-4014-9ed2-30c22ef2aa02	pink-x-white	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
3f1d0be8-9307-47ce-bd84-398357352dc2	white-x-pink	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
cf3e0df8-8ac8-4d81-ba74-d71aa87c0699	black-x-pink	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
60b5ad9d-55f2-4ca2-bb13-73b24b65ffd7	black-x-red	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
293293d4-643e-4fff-8743-e65cf5ad769b	antique-gold	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
db7d838f-47b5-4339-890e-e454088fc5f1	silver	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
048b81e4-743c-4648-b47a-ba9c77588c5a	white-x-black	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
3adc3bb7-7b11-479f-a169-f52851ca6290	beige-x-brown	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
2ead53d0-fec4-455f-9ae5-438f72d896c4	sax-x-white	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
2decd39b-3924-4c67-8113-776f914c9c50	black-x-navy	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
919f522e-c2bf-4f28-87c9-44a2411b2e68	dark-pink	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
ab0d226a-4319-4ea6-881d-3f6254e1007b	antique-silver	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
012d08f0-d5cf-4a3f-b3bc-8521065d1982	milk-tea	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
318ccd79-4cd4-4698-9f6c-32b28f61e45f	orange	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
967b8c2e-e7d3-4554-bd48-d1fbdff4511f	red-x-white	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
79c9934d-b7f3-4643-b739-2f8a2d611766	black-x-beige	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
d63ce2cc-c409-44aa-93f5-9bb4b4927681	brown-x-beige	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
db3c33ad-3c49-4841-9a94-5354c08b94ab	black-x-gray	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
fa65a6ea-9f7d-42a3-bee2-b26f3a053bf8	black-x-silver	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
b3653f71-cd10-4825-ac4a-4b057985f51c	red-x-offwhite	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
2d2aef41-5720-41b4-9418-9b85559243d9	black-x-gold	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
d89ee8a5-a037-41fa-92c6-ce074118361a	offwhite-x-black	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
92ddd18a-0f3a-4d26-a926-49a6ef3611d1	black-x-blue	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
138c9b1a-a7d3-4649-b3d8-6805737ae7e9	navy-x-offwhite	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
f62fe35a-a012-411e-9ed1-58679eaea2f4	sax-x-offwhite	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
59e71c69-868d-48cf-b837-25988a97d14e	brown-x-pink	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
db1e19ab-e75e-41a9-bcc2-8dcf4b9a680f	black-x-purple	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
8bb5b45d-8ad3-4efa-89e3-894ef0ca143a	pink-x-sax	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
cc3d71d0-6644-4349-822a-1a45246c9658	navy-x-white	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
f6023d08-cec1-4642-b7c7-c6bad4d94697	lavender-x-white	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
1c974af8-c49c-4f4c-9a3c-b8580fe377b5	olive	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
e6c0e6e4-77c2-43e3-b4b1-43d0033de5a7	gray-x-black	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
f9bdb0cd-4eef-403f-b5ba-19db6c32ef08	ivory-x-brown	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
dd261a43-6f7a-43de-a6cb-51cdeb8b8ebb	red-x-pink	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
69758125-19d0-4692-a2c4-28f138ebeb3a	white-x-red	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
2e3356a7-9a57-4bd4-897a-302a307e2eef	winebordeaux-x-offwhite	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
a157f14e-1920-4612-ad6a-18cce23422d0	pink-x-black	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
a1655996-08a3-4cb7-a420-224e95ca1389	white-x-navy	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
aea7288f-aad1-4533-95bf-21afd0de462a	blue-x-white	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
2ca0ed10-a5a7-4fa0-a17a-e558a64ce9c7	black-x-ivory	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
2c34bdf0-415e-4dd6-8f11-a634d011fc40	offwhite-x-navy	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
b8189edc-77a1-4b86-a1aa-0ca6ae8bb5bd	mint-x-white	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
3efe65f9-eb60-49fa-9c1a-bfc4e38508fe	white-x-gray	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
b9a1f231-2af2-4aff-8273-988c420eea25	black-x-green	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
756725e3-f9e0-4ce6-8448-09b7adde2b9b	greenmint-x-brown	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
165c5f0f-e522-4960-8aa2-5f5572d5653b	navy-x-black	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
4ec0e82f-d600-4cc3-acd3-9499f4769159	ivory-x-black	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
4bd56904-9a85-4115-927e-f401d3cb992b	black-x-plum	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
a1c2ea36-02df-4045-9666-3e1b17b7daa5	white-x-green	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
0a4e7498-d182-43ef-9a6d-67fecc8ba2e0	lavender-x-black	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
9804e495-074b-4bea-92dd-b1775546a311	offwhitecream	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
5fba2c5d-da13-4e9e-92a6-aee3636129ff	pink-gold	2017-03-20 09:29:51+00	2019-12-20 20:48:46+00
fb9e1612-cb2a-4bfa-883b-e965c7602e9c	white-wine/bordeaux	2019-12-21 11:30:55+00	2019-12-21 11:30:55+00
8d059289-3793-4ec2-b556-5a128a5c1b64	black-x-wine/bordeaux	2017-03-20 09:29:51+00	2019-12-21 11:35:34+00
0fd3ab6b-ac96-4c14-b9ef-a510cf2928d1	red-x-gold	2019-12-23 19:49:44+00	2019-12-23 19:49:44+00
6b2bc71e-a3b7-470d-ae91-4e99fc012cb1	navy-x-silver	2019-12-23 19:50:22+00	2019-12-23 19:50:22+00
43169e5b-fd99-4f80-8d58-aceb77d72c44	n-a	2017-03-20 09:29:51+00	2019-12-23 19:56:48+00
9e8569df-5211-4b43-971f-6e1b83acaec3	navy-x-pink	2019-12-23 20:43:35+00	2019-12-23 20:43:35+00
5649c995-9ee1-4915-9dfe-6b5a14970f2b	pink-x-mint	2020-01-18 12:22:33+00	2020-01-18 12:22:33+00
9cda84cf-f486-4ba1-8493-5e0cc1f544c5	ivory-x-lavender	2020-01-18 12:22:49+00	2020-01-18 12:22:49+00
80956391-d0fa-464c-98df-407d3ff35d9d	mint-x-pink	2020-01-18 12:28:45+00	2020-01-18 12:28:45+00
ebc8e635-9b0a-4091-9583-6e8186b511d5	sax-x-navy	2020-01-26 22:08:00+00	2020-01-26 22:08:00+00
e8158d17-7600-4e80-9235-6c3d2c0683d7	pink-x-red	2020-02-01 21:26:27+00	2020-02-01 21:26:27+00
c8cc0a61-94f6-433d-bbea-4505bd712c98	caramel	2020-02-14 10:54:33+00	2020-02-14 10:54:33+00
bf47f77c-8a10-4402-80f8-f88485fd22ba	multicolor-rainbow	2020-03-18 19:48:11+00	2020-03-18 19:48:11+00
68030200-29fe-4be6-9a8a-9c748d79f58d	pink-x-lavender	2020-03-24 21:14:42+00	2020-03-24 21:14:42+00
e791f77d-9368-43ed-a22f-f800068f0c56	yellow-x-sax	2020-03-24 21:15:11+00	2020-03-24 21:15:11+00
a2ce7d87-d15f-4e82-a6a2-72f596e11d7a	red-x-blue	2020-04-01 14:27:24+00	2020-04-01 14:27:24+00
2c5a6e04-c5c5-43f3-b24a-6257f81c573b	pink-x-yellow	2020-04-08 20:08:00+00	2020-04-08 20:08:00+00
31eaf687-f429-4773-8cb6-e07e49d8126d	lavender-x-sax	2020-04-08 20:58:12+00	2020-04-08 20:58:12+00
38d13588-b9b5-40d0-8f16-24106e754156	white	2017-03-20 09:29:51+00	2020-04-10 22:18:44+00
\.


--
-- Data for Name: color_translations; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.color_translations (id, color_id, locale, name, created_at, updated_at) FROM stdin;
1	480112b1-5c69-494c-92fe-5074b078fd61	en	Black	\N	\N
2	01c5418e-b4a6-46e6-8b3b-5c208e1b5232	en	Pink	\N	\N
3	6ea2597b-4c5b-4988-9695-b867b4f12014	en	Offwhite	\N	\N
4	c78ab9b5-9b49-4d61-8040-e0b181179ca6	en	Ivory	\N	\N
5	81448b74-56a4-431f-a1bf-f763f73665fa	en	Navy	\N	\N
6	ef1cf482-5ddc-4f15-8548-3df03fe7ee90	en	Brown	\N	\N
7	e6a00b63-e173-48b4-ad20-dbbc0716eced	en	Red	\N	\N
8	82a10bf0-ed01-47bb-b426-02cb2528403e	en	Wine/Bordeaux	\N	\N
9	3a547686-d0fb-483a-bfc6-ec6d6ac3df29	en	Sax	\N	\N
10	ac470398-8ca1-4cf3-a12b-221783058fae	en	Blue	\N	\N
11	78e79ff0-f34f-4a8a-8e59-42908e19e2d4	en	Beige	\N	\N
12	fefee163-372c-4911-abb2-90369443025a	en	Lavender	\N	\N
13	358ad676-0490-4379-8e31-246113ff0f1d	en	Green	\N	\N
14	095dad29-3e3d-43e8-aeaf-dc9b4c70c1f3	en	Mint	\N	\N
15	150c5a2d-096a-4aaa-8802-c240e6e0c0f6	en	Black x White	\N	\N
16	ea28e93d-00d4-44f2-81c6-ab0b3e716488	en	Gray	\N	\N
17	a3aa88d6-9587-463f-9e28-3e4d0a9998dd	en	Black x Offwhite	\N	\N
18	83458461-6784-43c6-b135-b30a5719b6d0	en	Yellow	\N	\N
19	9b78bfc6-f398-4e67-a716-a2587de5c2e9	en	Purple	\N	\N
20	96db0661-4119-4c1b-87fd-106cb3a8c2ef	en	Rose	\N	\N
21	d40726c6-3e74-47af-8367-c57cfae79416	en	Pink x Offwhite	\N	\N
22	455d08e3-b871-459f-8b11-33235735ac55	en	Cream	\N	\N
23	cabbd55f-c407-412b-a953-18cca0eca6b3	en	Gold	\N	\N
24	28770e8e-e92e-4014-9ed2-30c22ef2aa02	en	Pink x White	\N	\N
25	3f1d0be8-9307-47ce-bd84-398357352dc2	en	White x Pink	\N	\N
26	cf3e0df8-8ac8-4d81-ba74-d71aa87c0699	en	Black x Pink	\N	\N
27	60b5ad9d-55f2-4ca2-bb13-73b24b65ffd7	en	Black x Red	\N	\N
28	293293d4-643e-4fff-8743-e65cf5ad769b	en	Antique Gold	\N	\N
29	db7d838f-47b5-4339-890e-e454088fc5f1	en	Silver	\N	\N
30	048b81e4-743c-4648-b47a-ba9c77588c5a	en	White x Black	\N	\N
31	3adc3bb7-7b11-479f-a169-f52851ca6290	en	Beige x Brown	\N	\N
32	2ead53d0-fec4-455f-9ae5-438f72d896c4	en	Sax x White	\N	\N
33	2decd39b-3924-4c67-8113-776f914c9c50	en	Black x Navy	\N	\N
34	919f522e-c2bf-4f28-87c9-44a2411b2e68	en	Dark Pink	\N	\N
35	ab0d226a-4319-4ea6-881d-3f6254e1007b	en	Antique Silver	\N	\N
36	012d08f0-d5cf-4a3f-b3bc-8521065d1982	en	Milk tea	\N	\N
37	318ccd79-4cd4-4698-9f6c-32b28f61e45f	en	Orange	\N	\N
38	967b8c2e-e7d3-4554-bd48-d1fbdff4511f	en	Red x White	\N	\N
39	79c9934d-b7f3-4643-b739-2f8a2d611766	en	Black x Beige	\N	\N
40	d63ce2cc-c409-44aa-93f5-9bb4b4927681	en	Brown x Beige	\N	\N
41	db3c33ad-3c49-4841-9a94-5354c08b94ab	en	Black x Gray	\N	\N
42	fa65a6ea-9f7d-42a3-bee2-b26f3a053bf8	en	Black x Silver	\N	\N
43	b3653f71-cd10-4825-ac4a-4b057985f51c	en	Red x Offwhite	\N	\N
44	2d2aef41-5720-41b4-9418-9b85559243d9	en	Black x Gold	\N	\N
45	d89ee8a5-a037-41fa-92c6-ce074118361a	en	Offwhite x Black	\N	\N
46	92ddd18a-0f3a-4d26-a926-49a6ef3611d1	en	Black x Blue	\N	\N
47	138c9b1a-a7d3-4649-b3d8-6805737ae7e9	en	Navy x Offwhite	\N	\N
48	f62fe35a-a012-411e-9ed1-58679eaea2f4	en	Sax x Offwhite	\N	\N
49	59e71c69-868d-48cf-b837-25988a97d14e	en	Brown x Pink	\N	\N
50	db1e19ab-e75e-41a9-bcc2-8dcf4b9a680f	en	Black x Purple	\N	\N
51	8bb5b45d-8ad3-4efa-89e3-894ef0ca143a	en	Pink x Sax	\N	\N
52	cc3d71d0-6644-4349-822a-1a45246c9658	en	Navy x White	\N	\N
53	f6023d08-cec1-4642-b7c7-c6bad4d94697	en	Lavender x White	\N	\N
54	1c974af8-c49c-4f4c-9a3c-b8580fe377b5	en	Olive	\N	\N
55	e6c0e6e4-77c2-43e3-b4b1-43d0033de5a7	en	Gray x Black	\N	\N
56	f9bdb0cd-4eef-403f-b5ba-19db6c32ef08	en	Ivory x Brown	\N	\N
57	dd261a43-6f7a-43de-a6cb-51cdeb8b8ebb	en	Red x Pink	\N	\N
58	69758125-19d0-4692-a2c4-28f138ebeb3a	en	White x Red	\N	\N
59	2e3356a7-9a57-4bd4-897a-302a307e2eef	en	Wine/Bordeaux x Offwhite	\N	\N
60	a157f14e-1920-4612-ad6a-18cce23422d0	en	Pink x Black	\N	\N
61	a1655996-08a3-4cb7-a420-224e95ca1389	en	White x Navy	\N	\N
62	aea7288f-aad1-4533-95bf-21afd0de462a	en	Blue x White	\N	\N
63	2ca0ed10-a5a7-4fa0-a17a-e558a64ce9c7	en	Black x Ivory	\N	\N
64	2c34bdf0-415e-4dd6-8f11-a634d011fc40	en	Offwhite x Navy	\N	\N
65	b8189edc-77a1-4b86-a1aa-0ca6ae8bb5bd	en	Mint x White	\N	\N
66	3efe65f9-eb60-49fa-9c1a-bfc4e38508fe	en	White x Gray	\N	\N
67	b9a1f231-2af2-4aff-8273-988c420eea25	en	Black x Green	\N	\N
68	756725e3-f9e0-4ce6-8448-09b7adde2b9b	en	Green/Mint x Brown	\N	\N
69	165c5f0f-e522-4960-8aa2-5f5572d5653b	en	Navy x Black	\N	\N
70	4ec0e82f-d600-4cc3-acd3-9499f4769159	en	Ivory x Black	\N	\N
71	4bd56904-9a85-4115-927e-f401d3cb992b	en	Black x Plum	\N	\N
72	a1c2ea36-02df-4045-9666-3e1b17b7daa5	en	White x Green	\N	\N
73	0a4e7498-d182-43ef-9a6d-67fecc8ba2e0	en	Lavender x Black	\N	\N
74	9804e495-074b-4bea-92dd-b1775546a311	en	Offwhite/Cream	\N	\N
75	5fba2c5d-da13-4e9e-92a6-aee3636129ff	en	Pink x Gold	\N	\N
76	fb9e1612-cb2a-4bfa-883b-e965c7602e9c	en	White x Wine/Bordeaux	\N	\N
77	8d059289-3793-4ec2-b556-5a128a5c1b64	en	Black x Wine/Bordeaux	\N	\N
78	0fd3ab6b-ac96-4c14-b9ef-a510cf2928d1	en	Red x Gold	\N	\N
79	6b2bc71e-a3b7-470d-ae91-4e99fc012cb1	en	Navy x Silver	\N	\N
80	43169e5b-fd99-4f80-8d58-aceb77d72c44	en	N/A	\N	\N
81	9e8569df-5211-4b43-971f-6e1b83acaec3	en	Navy x Pink	\N	\N
82	5649c995-9ee1-4915-9dfe-6b5a14970f2b	en	Pink x Mint	\N	\N
83	9cda84cf-f486-4ba1-8493-5e0cc1f544c5	en	Ivory x Lavender	\N	\N
84	80956391-d0fa-464c-98df-407d3ff35d9d	en	Mint x Pink	\N	\N
85	ebc8e635-9b0a-4091-9583-6e8186b511d5	en	Sax x Navy	\N	\N
86	e8158d17-7600-4e80-9235-6c3d2c0683d7	en	Pink x Red	\N	\N
87	c8cc0a61-94f6-433d-bbea-4505bd712c98	en	Caramel	\N	\N
88	bf47f77c-8a10-4402-80f8-f88485fd22ba	en	Multicolor/Rainbow	\N	\N
89	68030200-29fe-4be6-9a8a-9c748d79f58d	en	Pink x Lavender	\N	\N
90	e791f77d-9368-43ed-a22f-f800068f0c56	en	Yellow x Sax	\N	\N
91	a2ce7d87-d15f-4e82-a6a2-72f596e11d7a	en	Red x Blue	\N	\N
92	2c5a6e04-c5c5-43f3-b24a-6257f81c573b	en	Pink x Yellow	\N	\N
93	31eaf687-f429-4773-8cb6-e07e49d8126d	en	Lavender x Sax	\N	\N
94	38d13588-b9b5-40d0-8f16-24106e754156	en	White	\N	\N
\.


--
-- Data for Name: features; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.features (id, slug, created_at, updated_at) FROM stdin;
5936cf73-5d8b-4545-832d-38ab93f80c13	lining	2017-03-20 09:29:51+00	2017-03-20 09:29:51+00
b8ef6a0d-3547-495c-a352-1a44fe77381d	pockets	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
ef7c1c4e-fd71-4a25-9e93-1153f0a4b647	pintucks	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
e387d3a3-0748-480a-b428-948b50c52006	pleats	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
b96c126b-1569-404f-8af8-7d27d5afab05	neck-ties	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
f6c244a4-34f7-4c71-84e5-5f0fd86d51bf	bustled	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
c21a711b-8645-45e2-9a82-9fa2822df94b	decorative-chains	2026-02-06 23:59:16+00	2026-02-06 23:59:16+00
243afa26-fef3-446a-91b4-fe6ee5cd15d4	scalloped	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
559ee9d9-b202-4b6c-8750-d61a1550659e	boning	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
4df859a5-5dcd-46ea-ba8c-e6f1f86392b1	tucks	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
46e9e476-979f-4a1a-ba7c-8421f2999970	jabot	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
df360fe6-6ba8-42ec-b369-4de5bf96a712	capelet	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
41d1d5b8-10d8-4689-8451-36672951973f	underbust	2017-03-20 09:29:52+00	2017-03-20 09:29:52+00
d4f4b763-e713-4790-b96a-44a178ff8023	sailor-collar	2017-08-15 10:29:42+00	2017-08-15 10:29:42+00
e3b4296c-6a6d-4916-8dcd-2419a9f54688	detachable-strap	2019-12-20 20:52:45+00	2019-12-20 20:52:45+00
dd506f1a-0a4a-462e-9de3-ef8574772177	buttoned-cuffs	2019-12-21 09:25:26+00	2019-12-21 09:25:26+00
2ee8658e-8efc-48b5-83b0-d3f52972c32a	elasticized-cuffs	2019-12-21 09:26:32+00	2019-12-21 09:26:32+00
96dcb439-7b4f-458b-9637-0385d5d57318	back zip	2019-12-21 11:41:03+00	2019-12-21 11:41:03+00
32626389-7be6-42f9-8ef5-d4c3c17defb2	kimono-sleeves	2020-02-14 11:43:27+00	2020-02-14 11:43:27+00
20facfbd-2472-4eaa-be51-e9de6698563a	frog-closure	2020-02-14 19:10:47+00	2020-02-14 19:10:57+00
2301684f-60cb-40f0-92f0-5d499f97452e	peter-pan-collar	2017-03-20 09:29:52+00	2020-02-24 17:02:13+00
215c6ed0-bb6d-407e-a01e-d7ce2f724dac	removable-collar	2017-03-20 09:29:52+00	2020-02-24 17:02:20+00
25e00d3b-71c6-4243-8a86-3b393f40fb90	high-neck-collar	2017-03-20 09:29:52+00	2020-02-24 17:02:27+00
3157e7d1-d18d-4812-9509-39f2d106f913	removable-sash	2017-03-20 09:29:52+00	2020-02-24 17:02:33+00
353a0f70-f93a-49f7-8b72-d6e35e2af92b	short-sleeves	2017-03-20 09:29:52+00	2020-02-24 17:02:39+00
3de93969-d329-4260-a7f6-68b3cef55e33	princess-sleeves	2017-03-20 09:29:52+00	2020-02-24 17:02:45+00
4dcabb42-8d90-4e62-b15b-160638718ce2	removable-belt	2017-03-20 09:29:52+00	2020-02-24 17:02:53+00
58cb6890-7f3d-4f70-8841-222cef92dda0	long-sleeves	2017-03-20 09:29:52+00	2020-02-24 17:03:04+00
6464d4a9-5655-4ff4-9fe5-d9b217aa49b9	detachable-apron	2017-03-20 09:29:52+00	2020-02-24 17:03:19+00
6a17ade6-173c-4849-9b65-bed17747f419	back-shirring	2017-03-20 09:29:52+00	2020-02-24 17:03:25+00
6a58020e-a6cc-4af7-ba89-77b839930460	empire-waist	2017-03-20 09:29:52+00	2020-02-24 17:03:30+00
1b240899-2e1a-4531-b45a-525a5f97073c	no-shirring	2017-03-20 09:29:51+00	2020-02-24 17:04:00+00
ff7f5968-db54-4439-b5a1-d39bd4eb0a95	detachable-trim	2017-03-20 09:29:52+00	2020-02-24 17:04:16+00
ed0f6875-4ff8-426c-8e7a-66ba0d0ffb9f	halter-neckline	2017-03-20 09:29:52+00	2020-02-24 17:04:22+00
e2cb096e-bd2e-402e-a597-02083ef2fc0c	side-zip	2017-03-20 09:29:52+00	2020-02-24 17:04:39+00
de015110-805c-4fc0-9c51-a9351f283895	corset-lacing	2017-03-20 09:29:51+00	2020-02-24 17:04:47+00
d7155e56-dcae-435e-bb55-e68edb4920c0	detachable-sleeves	2017-03-20 09:29:52+00	2020-02-24 17:04:53+00
c85d68f9-2fa3-4232-a347-0dc371f0caf5	full-shirring	2017-03-20 09:29:52+00	2020-02-24 17:05:07+00
bcf83fbb-1fc4-483a-9282-7cd33a1257cd	built-in-petticoat	2017-03-20 09:29:52+00	2020-02-24 17:05:13+00
b22223d7-6ad1-4d9a-98fe-8ea3e3b8a273	adjustable-straps	2017-03-20 09:29:52+00	2020-02-24 17:05:27+00
acff794f-1c7b-4093-80df-2c06d674fce7	detachable-bow	2017-03-20 09:29:52+00	2020-02-24 17:05:33+00
a1fa33c8-9708-41b9-bd89-e96b02283027	tiered-skirt	2017-03-20 09:29:52+00	2020-02-24 17:05:50+00
9e93eb7c-b819-4266-8553-7f752caada8a	partial-shirring	2017-03-20 09:29:52+00	2020-02-24 17:05:54+00
82379390-f647-4a8b-84a6-871079705347	detachable-yoke	2017-03-20 09:29:52+00	2020-02-24 17:05:58+00
6b1c8cf3-89de-44d7-a2e7-9792900b8742	convertible-straps	2017-03-20 09:29:52+00	2020-02-24 17:06:02+00
ccfa8f72-797d-44a9-bd0b-f0281c888a34	detachable-waist-ties	2017-03-20 09:29:52+00	2020-02-24 17:08:16+00
0f106ab4-d72c-416a-8dfa-81ac414433db	dropped-waist	2017-03-20 09:29:52+00	2020-02-24 17:08:38+00
003de53c-fe4c-4096-b73c-49d4b2442605	high-waist	2017-03-20 09:29:52+00	2020-02-24 17:08:43+00
5ebe83cc-af98-4fd5-a971-cad4a315904d	hood	2020-03-08 17:14:47+00	2020-03-08 17:14:47+00
d35f8916-54d3-458a-b108-5829a145b543	corset-lace-(decorative)	2019-12-16 21:50:29+00	2020-03-18 18:58:14+00
a77da88c-45ef-46d2-a052-8dd91af68fbd	buttoned-front	2020-03-24 21:46:48+00	2020-03-24 21:46:48+00
6e32dc1a-46f1-4eac-a48b-50181e70e970	no-sleeves	2020-03-24 21:47:45+00	2020-03-24 21:47:45+00
3e8f645a-56ef-4b25-a912-728f78e05b67	wedge	2021-02-26 17:57:46+00	2021-02-26 17:57:46+00
d706d9e4-2a19-44ee-aaf2-6f1b7c98333c	platform	2021-02-26 17:58:00+00	2021-02-26 17:58:00+00
f2b4f2b9-90bd-409d-a9cf-7cbcb7355884	open-toe	2021-02-26 20:39:46+00	2021-02-26 20:39:46+00
d25b4f9a-f3d0-4730-8f15-4fdd41261ac9	open-heel	2021-02-26 20:39:58+00	2021-02-26 20:39:58+00
7f2e9c05-58d5-475b-8387-94348e7fba73	shoes-lacing	2021-02-26 20:40:44+00	2021-02-26 20:40:44+00
04a85d56-20e1-4b9d-b8de-f83ae062c893	style-boot	2021-02-26 20:53:06+00	2021-02-26 20:53:06+00
f8d11025-c332-4285-954d-121c965c7ba6	oxford	2021-03-29 20:37:48+00	2021-03-29 20:37:48+00
b2d8cabf-3786-4f93-a8e1-c4925b041f09	sandal	2021-03-29 20:38:29+00	2021-03-29 20:38:29+00
019ee3f5-61dc-48e2-8ac3-69ea4e03e73e	ankle-boot	2021-03-29 20:39:02+00	2021-03-29 20:39:02+00
61689f51-22fc-4063-8bab-79250aa89cd7	sack-cut	2023-07-11 02:49:53+00	2023-07-11 02:49:53+00
7091ebe6-73ad-46a4-bef1-7ccf05244c7c	swallowtail	2024-06-30 00:59:29+00	2024-06-30 00:59:29+00
e3989f1e-43ba-4665-a449-79cc911eb3af	buckles	2024-11-29 04:42:25+00	2024-11-29 04:42:25+00
\.


--
-- Data for Name: feature_translations; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.feature_translations (id, feature_id, locale, name, created_at, updated_at) FROM stdin;
1	5936cf73-5d8b-4545-832d-38ab93f80c13	en	Lining	\N	\N
2	b8ef6a0d-3547-495c-a352-1a44fe77381d	en	Pockets	\N	\N
3	ef7c1c4e-fd71-4a25-9e93-1153f0a4b647	en	Pintucks	\N	\N
4	e387d3a3-0748-480a-b428-948b50c52006	en	Pleats	\N	\N
5	b96c126b-1569-404f-8af8-7d27d5afab05	en	Neck ties	\N	\N
6	f6c244a4-34f7-4c71-84e5-5f0fd86d51bf	en	Bustled	\N	\N
7	243afa26-fef3-446a-91b4-fe6ee5cd15d4	en	Scalloped	\N	\N
8	559ee9d9-b202-4b6c-8750-d61a1550659e	en	Boning	\N	\N
9	4df859a5-5dcd-46ea-ba8c-e6f1f86392b1	en	Tucks	\N	\N
10	46e9e476-979f-4a1a-ba7c-8421f2999970	en	Jabot	\N	\N
11	df360fe6-6ba8-42ec-b369-4de5bf96a712	en	Capelet	\N	\N
12	41d1d5b8-10d8-4689-8451-36672951973f	en	Underbust	\N	\N
13	d4f4b763-e713-4790-b96a-44a178ff8023	en	Sailor Collar	\N	\N
14	e3b4296c-6a6d-4916-8dcd-2419a9f54688	en	Detachable Strap	\N	\N
15	dd506f1a-0a4a-462e-9de3-ef8574772177	en	Buttoned Cuffs	\N	\N
16	2ee8658e-8efc-48b5-83b0-d3f52972c32a	en	Elasticized Cuffs	\N	\N
17	96dcb439-7b4f-458b-9637-0385d5d57318	en	Back Zip	\N	\N
18	32626389-7be6-42f9-8ef5-d4c3c17defb2	en	Kimono Sleeves	\N	\N
19	20facfbd-2472-4eaa-be51-e9de6698563a	en	Frog Closure	\N	\N
20	2301684f-60cb-40f0-92f0-5d499f97452e	en	Peter Pan Collar	\N	\N
21	215c6ed0-bb6d-407e-a01e-d7ce2f724dac	en	Removable Collar	\N	\N
22	25e00d3b-71c6-4243-8a86-3b393f40fb90	en	High Neck Collar	\N	\N
23	3157e7d1-d18d-4812-9509-39f2d106f913	en	Removable Sash	\N	\N
24	353a0f70-f93a-49f7-8b72-d6e35e2af92b	en	Short Sleeves	\N	\N
25	3de93969-d329-4260-a7f6-68b3cef55e33	en	Princess Sleeves	\N	\N
26	4dcabb42-8d90-4e62-b15b-160638718ce2	en	Removable Belt	\N	\N
27	58cb6890-7f3d-4f70-8841-222cef92dda0	en	Long Sleeves	\N	\N
28	6464d4a9-5655-4ff4-9fe5-d9b217aa49b9	en	Detachable Apron	\N	\N
29	6a17ade6-173c-4849-9b65-bed17747f419	en	Back Shirring	\N	\N
30	6a58020e-a6cc-4af7-ba89-77b839930460	en	Empire Waist	\N	\N
31	1b240899-2e1a-4531-b45a-525a5f97073c	en	No Shirring	\N	\N
32	ff7f5968-db54-4439-b5a1-d39bd4eb0a95	en	Detachable Trim	\N	\N
33	ed0f6875-4ff8-426c-8e7a-66ba0d0ffb9f	en	Halter Neckline	\N	\N
34	e2cb096e-bd2e-402e-a597-02083ef2fc0c	en	Side Zip	\N	\N
35	de015110-805c-4fc0-9c51-a9351f283895	en	Corset Lacing	\N	\N
36	d7155e56-dcae-435e-bb55-e68edb4920c0	en	Detachable Sleeves	\N	\N
37	c85d68f9-2fa3-4232-a347-0dc371f0caf5	en	Full Shirring	\N	\N
38	bcf83fbb-1fc4-483a-9282-7cd33a1257cd	en	Built-In Petticoat	\N	\N
39	b22223d7-6ad1-4d9a-98fe-8ea3e3b8a273	en	Adjustable Straps	\N	\N
40	acff794f-1c7b-4093-80df-2c06d674fce7	en	Detachable Bow	\N	\N
41	a1fa33c8-9708-41b9-bd89-e96b02283027	en	Tiered Skirt	\N	\N
42	9e93eb7c-b819-4266-8553-7f752caada8a	en	Partial Shirring	\N	\N
43	82379390-f647-4a8b-84a6-871079705347	en	Detachable Yoke	\N	\N
44	6b1c8cf3-89de-44d7-a2e7-9792900b8742	en	Convertible Straps	\N	\N
45	ccfa8f72-797d-44a9-bd0b-f0281c888a34	en	Detachable Waist Ties	\N	\N
46	0f106ab4-d72c-416a-8dfa-81ac414433db	en	Dropped Waist	\N	\N
47	003de53c-fe4c-4096-b73c-49d4b2442605	en	High Waist	\N	\N
48	5ebe83cc-af98-4fd5-a971-cad4a315904d	en	Hood	\N	\N
49	d35f8916-54d3-458a-b108-5829a145b543	en	Decorative Corset Lacing	\N	\N
50	a77da88c-45ef-46d2-a052-8dd91af68fbd	en	Buttoned Front	\N	\N
51	6e32dc1a-46f1-4eac-a48b-50181e70e970	en	No Sleeves	\N	\N
52	3e8f645a-56ef-4b25-a912-728f78e05b67	en	Wedge	\N	\N
53	d706d9e4-2a19-44ee-aaf2-6f1b7c98333c	en	Platform	\N	\N
54	f2b4f2b9-90bd-409d-a9cf-7cbcb7355884	en	Open Toe	\N	\N
55	d25b4f9a-f3d0-4730-8f15-4fdd41261ac9	en	Open-Heel	\N	\N
56	7f2e9c05-58d5-475b-8387-94348e7fba73	en	Shoe Laces / Lace Up	\N	\N
57	04a85d56-20e1-4b9d-b8de-f83ae062c893	en	Style: Boot	\N	\N
58	f8d11025-c332-4285-954d-121c965c7ba6	en	Style: Oxford	\N	\N
59	b2d8cabf-3786-4f93-a8e1-c4925b041f09	en	Style: Sandal	\N	\N
60	019ee3f5-61dc-48e2-8ac3-69ea4e03e73e	en	Style: Ankle Boot	\N	\N
61	61689f51-22fc-4063-8bab-79250aa89cd7	en	Sack Cut/Waistless	\N	\N
123	f8d11025-c332-4285-954d-121c965c7ba6	fr	Type: Chaussures de ville	\N	\N
124	d25b4f9a-f3d0-4730-8f15-4fdd41261ac9	fr	Escarpins	\N	\N
125	019ee3f5-61dc-48e2-8ac3-69ea4e03e73e	fr	Type: Bottines	\N	\N
126	f2b4f2b9-90bd-409d-a9cf-7cbcb7355884	fr	À bout ouvert	\N	\N
127	3e8f645a-56ef-4b25-a912-728f78e05b67	fr	Talon compensé	\N	\N
128	32626389-7be6-42f9-8ef5-d4c3c17defb2	fr	Manches Kimono	\N	\N
129	20facfbd-2472-4eaa-be51-e9de6698563a	fr	Attache Brandebourg	\N	\N
130	b2d8cabf-3786-4f93-a8e1-c4925b041f09	fr	Type: Sandale	\N	\N
131	04a85d56-20e1-4b9d-b8de-f83ae062c893	fr	Type: Bottes	\N	\N
132	7f2e9c05-58d5-475b-8387-94348e7fba73	fr	Lacets/Laçage	\N	\N
133	d706d9e4-2a19-44ee-aaf2-6f1b7c98333c	fr	Plateforme	\N	\N
134	41d1d5b8-10d8-4689-8451-36672951973f	fr	Sous-poitrine	\N	\N
135	82379390-f647-4a8b-84a6-871079705347	fr	Empiècement amovible (buste)	\N	\N
136	e3b4296c-6a6d-4916-8dcd-2419a9f54688	fr	Bretelle/anse amovible	\N	\N
137	6464d4a9-5655-4ff4-9fe5-d9b217aa49b9	fr	Tablier amovible	\N	\N
138	6b1c8cf3-89de-44d7-a2e7-9792900b8742	fr	Bretelles convertibles	\N	\N
139	ed0f6875-4ff8-426c-8e7a-66ba0d0ffb9f	fr	Dos nu	\N	\N
140	df360fe6-6ba8-42ec-b369-4de5bf96a712	fr	Cape courte/capeline	\N	\N
141	4df859a5-5dcd-46ea-ba8c-e6f1f86392b1	fr	Nervures horizontales	\N	\N
142	46e9e476-979f-4a1a-ba7c-8421f2999970	fr	Jabot	\N	\N
143	d4f4b763-e713-4790-b96a-44a178ff8023	fr	Col Marin	\N	\N
144	6e32dc1a-46f1-4eac-a48b-50181e70e970	fr	Sans manche	\N	\N
145	5ebe83cc-af98-4fd5-a971-cad4a315904d	fr	Capuche	\N	\N
146	0f106ab4-d72c-416a-8dfa-81ac414433db	fr	Taille basse (hanches)	\N	\N
147	559ee9d9-b202-4b6c-8750-d61a1550659e	fr	Armatures	\N	\N
148	215c6ed0-bb6d-407e-a01e-d7ce2f724dac	fr	Col amovible	\N	\N
149	bcf83fbb-1fc4-483a-9282-7cd33a1257cd	fr	Jupon intégré	\N	\N
150	4dcabb42-8d90-4e62-b15b-160638718ce2	fr	Ceinture amovible	\N	\N
151	d7155e56-dcae-435e-bb55-e68edb4920c0	fr	Manches amovibles	\N	\N
152	3de93969-d329-4260-a7f6-68b3cef55e33	fr	Manches princesse	\N	\N
153	d35f8916-54d3-458a-b108-5829a145b543	fr	Laçage décoratif	\N	\N
154	3157e7d1-d18d-4812-9509-39f2d106f913	fr	Écharpe amovible	\N	\N
155	6a58020e-a6cc-4af7-ba89-77b839930460	fr	Taille empire	\N	\N
156	b96c126b-1569-404f-8af8-7d27d5afab05	fr	Bretelles tour de cou	\N	\N
157	243afa26-fef3-446a-91b4-fe6ee5cd15d4	fr	Festonné	\N	\N
158	f6c244a4-34f7-4c71-84e5-5f0fd86d51bf	fr	Tournure	\N	\N
159	a77da88c-45ef-46d2-a052-8dd91af68fbd	fr	Boutonnière avant	\N	\N
160	ff7f5968-db54-4439-b5a1-d39bd4eb0a95	fr	Bordure décorée amovible	\N	\N
161	96dcb439-7b4f-458b-9637-0385d5d57318	fr	Fermeture éclair arrière	\N	\N
162	e387d3a3-0748-480a-b428-948b50c52006	fr	Plis	\N	\N
163	2ee8658e-8efc-48b5-83b0-d3f52972c32a	fr	Manches élastiquées	\N	\N
164	25e00d3b-71c6-4243-8a86-3b393f40fb90	fr	Col haut	\N	\N
165	b22223d7-6ad1-4d9a-98fe-8ea3e3b8a273	fr	Bretelles ajustables	\N	\N
166	c85d68f9-2fa3-4232-a347-0dc371f0caf5	fr	Totalement élastiqué.e	\N	\N
167	ef7c1c4e-fd71-4a25-9e93-1153f0a4b647	fr	Nervures	\N	\N
168	dd506f1a-0a4a-462e-9de3-ef8574772177	fr	Poignets boutonnés	\N	\N
169	2301684f-60cb-40f0-92f0-5d499f97452e	fr	Col Claudine	\N	\N
170	6a17ade6-173c-4849-9b65-bed17747f419	fr	Dos élastiqué	\N	\N
171	003de53c-fe4c-4096-b73c-49d4b2442605	fr	Taille haute	\N	\N
172	b8ef6a0d-3547-495c-a352-1a44fe77381d	fr	Poches	\N	\N
173	a1fa33c8-9708-41b9-bd89-e96b02283027	fr	Jupe à volants	\N	\N
174	e2cb096e-bd2e-402e-a597-02083ef2fc0c	fr	Fermeture éclair sur le côté	\N	\N
175	ccfa8f72-797d-44a9-bd0b-f0281c888a34	fr	Waist ties amovibles	\N	\N
176	9e93eb7c-b819-4266-8553-7f752caada8a	fr	Partiellement élastiqué	\N	\N
177	353a0f70-f93a-49f7-8b72-d6e35e2af92b	fr	Manches courtes	\N	\N
178	acff794f-1c7b-4093-80df-2c06d674fce7	fr	Noeud amovible	\N	\N
179	de015110-805c-4fc0-9c51-a9351f283895	fr	Laçage	\N	\N
180	58cb6890-7f3d-4f70-8841-222cef92dda0	fr	Manches longues	\N	\N
181	1b240899-2e1a-4531-b45a-525a5f97073c	fr	Non élastiqué	\N	\N
182	5936cf73-5d8b-4545-832d-38ab93f80c13	fr	Doublure	\N	\N
304	f8d11025-c332-4285-954d-121c965c7ba6	nl	Type: Oxford	\N	\N
305	d25b4f9a-f3d0-4730-8f15-4fdd41261ac9	nl	Open hiel	\N	\N
306	019ee3f5-61dc-48e2-8ac3-69ea4e03e73e	nl	Type: Enkellaarzen	\N	\N
307	f2b4f2b9-90bd-409d-a9cf-7cbcb7355884	nl	Peeptoes	\N	\N
308	3e8f645a-56ef-4b25-a912-728f78e05b67	nl	Sleehak	\N	\N
309	32626389-7be6-42f9-8ef5-d4c3c17defb2	nl	Kimono mouwen	\N	\N
310	20facfbd-2472-4eaa-be51-e9de6698563a	nl	Brandenburger sluiting	\N	\N
311	b2d8cabf-3786-4f93-a8e1-c4925b041f09	nl	Type: Sandalen	\N	\N
312	04a85d56-20e1-4b9d-b8de-f83ae062c893	nl	Type: Laarzen	\N	\N
313	7f2e9c05-58d5-475b-8387-94348e7fba73	nl	Schoenveters/Vetersluiting	\N	\N
314	d706d9e4-2a19-44ee-aaf2-6f1b7c98333c	nl	Plateauzolen	\N	\N
315	41d1d5b8-10d8-4689-8451-36672951973f	nl	Onderborst	\N	\N
316	82379390-f647-4a8b-84a6-871079705347	nl	Afneembare borstkraag	\N	\N
317	e3b4296c-6a6d-4916-8dcd-2419a9f54688	nl	Afneembare riem/band	\N	\N
318	6464d4a9-5655-4ff4-9fe5-d9b217aa49b9	nl	Afneembaar schort	\N	\N
319	6b1c8cf3-89de-44d7-a2e7-9792900b8742	nl	Converteerbare bandjes	\N	\N
320	ed0f6875-4ff8-426c-8e7a-66ba0d0ffb9f	nl	Halternek	\N	\N
321	df360fe6-6ba8-42ec-b369-4de5bf96a712	nl	Korte cape	\N	\N
322	4df859a5-5dcd-46ea-ba8c-e6f1f86392b1	nl	Plooien	\N	\N
323	46e9e476-979f-4a1a-ba7c-8421f2999970	nl	Jabot	\N	\N
324	d4f4b763-e713-4790-b96a-44a178ff8023	nl	Matrozenkraag	\N	\N
325	6e32dc1a-46f1-4eac-a48b-50181e70e970	nl	Mouwloos	\N	\N
326	5ebe83cc-af98-4fd5-a971-cad4a315904d	nl	Capuchon	\N	\N
327	0f106ab4-d72c-416a-8dfa-81ac414433db	nl	Verlaagde taille	\N	\N
328	559ee9d9-b202-4b6c-8750-d61a1550659e	nl	Baleinen	\N	\N
329	215c6ed0-bb6d-407e-a01e-d7ce2f724dac	nl	Afneembare kraag	\N	\N
330	bcf83fbb-1fc4-483a-9282-7cd33a1257cd	nl	Ingebouwde petticoat	\N	\N
331	4dcabb42-8d90-4e62-b15b-160638718ce2	nl	Afneembare riem	\N	\N
332	d7155e56-dcae-435e-bb55-e68edb4920c0	nl	Afneembare mouwen	\N	\N
333	3de93969-d329-4260-a7f6-68b3cef55e33	nl	Prinses mouwen	\N	\N
334	d35f8916-54d3-458a-b108-5829a145b543	nl	Decoratieve korset vetersluiting	\N	\N
335	3157e7d1-d18d-4812-9509-39f2d106f913	nl	Afneembare sjerp	\N	\N
336	6a58020e-a6cc-4af7-ba89-77b839930460	nl	Empiretaille	\N	\N
337	b96c126b-1569-404f-8af8-7d27d5afab05	nl	Stropdassen	\N	\N
338	243afa26-fef3-446a-91b4-fe6ee5cd15d4	nl	Geschulpt	\N	\N
339	f6c244a4-34f7-4c71-84e5-5f0fd86d51bf	nl	Tournure	\N	\N
340	a77da88c-45ef-46d2-a052-8dd91af68fbd	nl	Knoopsluiting aan voorkant	\N	\N
341	ff7f5968-db54-4439-b5a1-d39bd4eb0a95	nl	Afneembare rand	\N	\N
342	96dcb439-7b4f-458b-9637-0385d5d57318	nl	Ritssluiting achter	\N	\N
343	e387d3a3-0748-480a-b428-948b50c52006	nl	Plooien	\N	\N
344	2ee8658e-8efc-48b5-83b0-d3f52972c32a	nl	Elastische manchetten	\N	\N
345	25e00d3b-71c6-4243-8a86-3b393f40fb90	nl	Hoge kraag	\N	\N
346	b22223d7-6ad1-4d9a-98fe-8ea3e3b8a273	nl	Verstelbare bandjes	\N	\N
347	c85d68f9-2fa3-4232-a347-0dc371f0caf5	nl	Volledig elastisch	\N	\N
348	ef7c1c4e-fd71-4a25-9e93-1153f0a4b647	nl	Biezen	\N	\N
349	dd506f1a-0a4a-462e-9de3-ef8574772177	nl	Manchetten met knopen	\N	\N
350	2301684f-60cb-40f0-92f0-5d499f97452e	nl	Peter Pan-kraag	\N	\N
351	6a17ade6-173c-4849-9b65-bed17747f419	nl	Elastisch achter	\N	\N
352	003de53c-fe4c-4096-b73c-49d4b2442605	nl	Verhoogde taille	\N	\N
353	b8ef6a0d-3547-495c-a352-1a44fe77381d	nl	Zakken	\N	\N
354	a1fa33c8-9708-41b9-bd89-e96b02283027	nl	Laagjes rok	\N	\N
355	e2cb096e-bd2e-402e-a597-02083ef2fc0c	nl	Zijrits	\N	\N
356	ccfa8f72-797d-44a9-bd0b-f0281c888a34	nl	Afneembare taillebanden	\N	\N
357	9e93eb7c-b819-4266-8553-7f752caada8a	nl	Gedeeltelijk elastisch	\N	\N
358	353a0f70-f93a-49f7-8b72-d6e35e2af92b	nl	Korte mouwen	\N	\N
359	acff794f-1c7b-4093-80df-2c06d674fce7	nl	Afneembare strik	\N	\N
360	de015110-805c-4fc0-9c51-a9351f283895	nl	Korset vetersluiting	\N	\N
361	58cb6890-7f3d-4f70-8841-222cef92dda0	nl	Lange mouwen	\N	\N
362	1b240899-2e1a-4531-b45a-525a5f97073c	nl	Geen elastiek	\N	\N
363	5936cf73-5d8b-4545-832d-38ab93f80c13	nl	Onderlaag/Voering	\N	\N
364	61689f51-22fc-4063-8bab-79250aa89cd7	nl	Zonder taille	\N	\N
486	61689f51-22fc-4063-8bab-79250aa89cd7	fr	Coupe sac/ Taille non marquée	\N	\N
487	f8d11025-c332-4285-954d-121c965c7ba6	it	Stile: Oxford	\N	\N
488	32626389-7be6-42f9-8ef5-d4c3c17defb2	it	Maniche A Kimono	\N	\N
489	2ee8658e-8efc-48b5-83b0-d3f52972c32a	it	Polsini Elasticizzati	\N	\N
490	bcf83fbb-1fc4-483a-9282-7cd33a1257cd	it	Sottogonna Incorporata	\N	\N
491	b8ef6a0d-3547-495c-a352-1a44fe77381d	it	Tasche	\N	\N
492	b96c126b-1569-404f-8af8-7d27d5afab05	it	Cravatte	\N	\N
493	4dcabb42-8d90-4e62-b15b-160638718ce2	it	Cintura Removibile	\N	\N
494	3de93969-d329-4260-a7f6-68b3cef55e33	it	Maniche da Principessa	\N	\N
495	20facfbd-2472-4eaa-be51-e9de6698563a	it	Chiusura con Alamaro	\N	\N
496	3157e7d1-d18d-4812-9509-39f2d106f913	it	Fascia Removibile	\N	\N
497	d25b4f9a-f3d0-4730-8f15-4fdd41261ac9	it	Tallone Aperto	\N	\N
498	353a0f70-f93a-49f7-8b72-d6e35e2af92b	it	Maniche Corte	\N	\N
499	243afa26-fef3-446a-91b4-fe6ee5cd15d4	it	Dentellato	\N	\N
500	b22223d7-6ad1-4d9a-98fe-8ea3e3b8a273	it	Spalline Regolabili	\N	\N
501	58cb6890-7f3d-4f70-8841-222cef92dda0	it	Maniche Lunghe	\N	\N
502	019ee3f5-61dc-48e2-8ac3-69ea4e03e73e	it	Stile: Stivaletto	\N	\N
503	6b1c8cf3-89de-44d7-a2e7-9792900b8742	it	Spalline Convertibili	\N	\N
504	f2b4f2b9-90bd-409d-a9cf-7cbcb7355884	it	Punta Aperta	\N	\N
505	1b240899-2e1a-4531-b45a-525a5f97073c	it	Non Elasticizzato	\N	\N
506	e3b4296c-6a6d-4916-8dcd-2419a9f54688	it	Strap Removibile	\N	\N
507	e2cb096e-bd2e-402e-a597-02083ef2fc0c	it	Zip Laterale	\N	\N
508	de015110-805c-4fc0-9c51-a9351f283895	it	Corsettatura	\N	\N
509	f6c244a4-34f7-4c71-84e5-5f0fd86d51bf	it	Sellino	\N	\N
510	61689f51-22fc-4063-8bab-79250aa89cd7	it	A Sacco/Senza Vita	\N	\N
511	ed0f6875-4ff8-426c-8e7a-66ba0d0ffb9f	it	Collo all'Americana	\N	\N
512	6a58020e-a6cc-4af7-ba89-77b839930460	it	Vita a Impero	\N	\N
513	d4f4b763-e713-4790-b96a-44a178ff8023	it	Colletto alla Marinara	\N	\N
514	ef7c1c4e-fd71-4a25-9e93-1153f0a4b647	it	Nervature	\N	\N
515	41d1d5b8-10d8-4689-8451-36672951973f	it	Sottobusto	\N	\N
516	a1fa33c8-9708-41b9-bd89-e96b02283027	it	Gonna a Strati	\N	\N
517	b2d8cabf-3786-4f93-a8e1-c4925b041f09	it	Stile: Sandalo	\N	\N
518	9e93eb7c-b819-4266-8553-7f752caada8a	it	Parzialmente Elasticizzato	\N	\N
519	d7155e56-dcae-435e-bb55-e68edb4920c0	it	Maniche Removibili	\N	\N
520	c85d68f9-2fa3-4232-a347-0dc371f0caf5	it	Completamente Elasticizzato	\N	\N
521	df360fe6-6ba8-42ec-b369-4de5bf96a712	it	Mantellina	\N	\N
522	25e00d3b-71c6-4243-8a86-3b393f40fb90	it	Colletto a Collo Alto	\N	\N
523	5936cf73-5d8b-4545-832d-38ab93f80c13	it	Fodera	\N	\N
524	ccfa8f72-797d-44a9-bd0b-f0281c888a34	it	Allacciatura in Vita Removibile	\N	\N
525	3e8f645a-56ef-4b25-a912-728f78e05b67	it	Zeppa	\N	\N
526	04a85d56-20e1-4b9d-b8de-f83ae062c893	it	Stile: Stivale	\N	\N
527	a77da88c-45ef-46d2-a052-8dd91af68fbd	it	Fronte con Bottoni	\N	\N
528	e387d3a3-0748-480a-b428-948b50c52006	it	Pieghettato	\N	\N
529	5ebe83cc-af98-4fd5-a971-cad4a315904d	it	Cappuccio	\N	\N
530	6464d4a9-5655-4ff4-9fe5-d9b217aa49b9	it	Grembiule Removibile	\N	\N
531	dd506f1a-0a4a-462e-9de3-ef8574772177	it	Polsini con Bottoni	\N	\N
532	d35f8916-54d3-458a-b108-5829a145b543	it	Corsettatura Decorativa	\N	\N
533	acff794f-1c7b-4093-80df-2c06d674fce7	it	Fiocco Removibile	\N	\N
534	215c6ed0-bb6d-407e-a01e-d7ce2f724dac	it	Colletto Removibile	\N	\N
535	003de53c-fe4c-4096-b73c-49d4b2442605	it	Vita Alta	\N	\N
536	ff7f5968-db54-4439-b5a1-d39bd4eb0a95	it	Bordo Removibile	\N	\N
537	46e9e476-979f-4a1a-ba7c-8421f2999970	it	Jabot	\N	\N
538	96dcb439-7b4f-458b-9637-0385d5d57318	it	Retro con Zip	\N	\N
539	82379390-f647-4a8b-84a6-871079705347	it	Sprone Removibile	\N	\N
540	7f2e9c05-58d5-475b-8387-94348e7fba73	it	Stringhe/Allacciatura	\N	\N
541	6e32dc1a-46f1-4eac-a48b-50181e70e970	it	Senza Maniche	\N	\N
542	0f106ab4-d72c-416a-8dfa-81ac414433db	it	Vita Bassa	\N	\N
543	6a17ade6-173c-4849-9b65-bed17747f419	it	Retro Elasticizzato	\N	\N
544	d706d9e4-2a19-44ee-aaf2-6f1b7c98333c	it	Zeppa a Piattaforma	\N	\N
545	2301684f-60cb-40f0-92f0-5d499f97452e	it	Colletto a Peter Pan	\N	\N
546	4df859a5-5dcd-46ea-ba8c-e6f1f86392b1	it	Pieghe	\N	\N
547	559ee9d9-b202-4b6c-8750-d61a1550659e	it	Stecche	\N	\N
610	7091ebe6-73ad-46a4-bef1-7ccf05244c7c	en	Swallowtail	2024-06-30 00:59:29+00	2024-06-30 00:59:29+00
612	e3989f1e-43ba-4665-a449-79cc911eb3af	en	Decorative Belts/Buckles	2024-11-29 04:42:25+00	2024-11-29 04:42:25+00
615	e3989f1e-43ba-4665-a449-79cc911eb3af	nb_NO	Decorative Belts/Buckles	2024-11-29 04:42:25+00	2024-11-29 04:42:25+00
613	e3989f1e-43ba-4665-a449-79cc911eb3af	fr	Boucles de Ceinture/Ceinture Décoratif	2024-11-29 04:42:25+00	2024-11-29 04:50:23+00
614	e3989f1e-43ba-4665-a449-79cc911eb3af	it	Fibbie/Cintura Decorativa	2024-11-29 04:42:25+00	2024-11-29 04:50:23+00
616	e3989f1e-43ba-4665-a449-79cc911eb3af	nl	Decoratieve Riem/Riemgespen	2024-11-29 04:42:25+00	2024-11-29 04:50:23+00
617	c21a711b-8645-45e2-9a82-9fa2822df94b	en	Decorative Chains	2026-02-06 23:59:16+00	2026-02-06 23:59:16+00
618	c21a711b-8645-45e2-9a82-9fa2822df94b	fr	Chaînes décoratives	2026-02-06 23:59:16+00	2026-02-06 23:59:16+00
619	c21a711b-8645-45e2-9a82-9fa2822df94b	it	Catene Decorativa	2026-02-06 23:59:16+00	2026-02-06 23:59:16+00
620	c21a711b-8645-45e2-9a82-9fa2822df94b	nl	Decoratieve Kettingen	2026-02-06 23:59:16+00	2026-02-06 23:59:16+00
\.


--
-- Data for Name: tags; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.tags (id, slug, created_at, updated_at) FROM stdin;
5287901a-111a-49a0-b3dd-a32052a8eef3	roses	2017-03-20 09:46:10+00	2017-03-20 09:46:10+00
3af89989-28c4-4e70-a08c-d4d8de2826c7	gardens	2017-03-20 09:46:10+00	2017-03-20 09:46:10+00
e1448e60-ce4d-4291-83e7-65c8b154e7e3	architectural	2017-03-20 09:46:10+00	2017-03-20 09:46:10+00
f500e424-9b4e-4a43-bb9e-3f84f76df7f9	chairs	2017-03-20 09:46:11+00	2017-03-20 09:46:11+00
8371d116-6102-4855-95c0-75ccd2bafc85	swans	2017-03-20 09:46:11+00	2017-03-20 09:46:11+00
cc17bf61-859d-48c2-b884-e96b8e1b5c4c	rainey-regalia	2025-08-15 13:14:36+00	2025-08-15 13:14:36+00
c115f273-3ddd-432b-b036-9d3c3823c3a4	perfumes	2017-03-20 09:46:11+00	2017-03-20 09:46:11+00
df261473-2a70-4ed5-8dd7-91452051eff4	bottles	2017-03-20 09:46:11+00	2017-03-20 09:46:11+00
f8cdc971-1c61-4ac8-a185-2742420a71ff	pearls	2017-03-20 09:46:11+00	2017-03-20 09:46:11+00
677ac1d2-3bed-40fd-8bb5-74dfbce18f88	jewelry	2017-03-20 09:46:11+00	2017-03-20 09:46:11+00
70c0964e-2f5c-4b79-9dea-b36fde2ceea1	writing	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
a9126e03-66ea-4b48-9b4e-187526246502	sweets	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
98189ad6-9575-4c0f-a0d8-386e7b91fa8a	stars	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
1ff3901d-1ece-4e79-b35c-067450b7bb74	hearts	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
cd1f0d47-08f4-4a32-9273-1ef117aaecf4	desserts	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
bdf7a0ab-8d53-491d-a7cf-5760da8e7546	cakes	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
3ec8747a-fee5-4ec8-811a-5f5c8f406c61	food	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
ce42a0bd-7fe6-4042-9142-33179cca6a3e	crowns	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
79a5d8b7-83ec-452e-b86b-de09b28af4ba	castles	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
148491eb-4c1d-4c84-9220-25d7c6a2a6c3	swan-lake	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
200b47c8-3fb0-4cf4-8bda-f9ceeab03300	fairy-tales	2017-03-20 09:46:12+00	2017-03-20 09:46:12+00
b5834ea3-ae9c-4c73-ad86-5cde023c37ad	florals	2017-03-20 09:46:13+00	2017-03-20 09:46:13+00
fa468a33-4710-42d5-aabb-bb2b56a0bd35	alice-in-wonderland	2017-03-20 09:46:13+00	2017-03-20 09:46:13+00
247fe0c3-96a4-45cf-ab9b-b72e74a786d0	trumps	2017-03-20 09:46:13+00	2017-03-20 09:46:13+00
409ac7eb-9b4a-455f-a21d-e659d22229d8	clocks	2017-03-20 09:46:13+00	2017-03-20 09:46:13+00
9d6dd0a2-4895-441b-a15f-6d46f79948dd	rabbits	2017-03-20 09:46:13+00	2017-03-20 09:46:13+00
9bca6dec-3592-480f-b1c2-7e9ef90d2dd3	strawberries	2017-03-20 09:46:14+00	2017-03-20 09:46:14+00
ee207d84-d31c-41fd-8f2a-d969aa561124	crosses	2017-03-20 09:46:14+00	2017-03-20 09:46:14+00
62a1429a-38e1-4cda-b1fd-714c453a6eac	frames	2017-03-20 09:46:14+00	2017-03-20 09:46:14+00
30d5df5e-2306-445b-ada3-50000431ba72	figures	2017-03-20 09:46:14+00	2017-03-20 09:46:14+00
9b15d05a-acab-49e8-9eb6-1388c47bb6bf	incomplete-colorways	2017-03-20 09:46:14+00	2017-03-20 09:46:14+00
bc777600-18a9-4ec1-b935-fcdc843d71b5	butterflies	2017-03-20 09:46:14+00	2017-03-20 09:46:14+00
a02b26f4-7e97-4416-b6e2-4aa0f1975fb7	thorns	2017-03-20 09:46:15+00	2017-03-20 09:46:15+00
e1cd8467-2bdc-42fb-81a9-5ce9508f7eca	windows	2017-03-20 09:46:15+00	2017-03-20 09:46:15+00
0c742330-c88e-41da-ad2f-4a8c260f57dd	gates	2017-03-20 09:46:16+00	2017-03-20 09:46:16+00
10cb852f-faec-489d-8fae-50023abca73a	chandeliers	2017-03-20 09:46:17+00	2017-03-20 09:46:17+00
833619de-fabc-409b-bf3d-fd986cccb52e	candles	2017-03-20 09:46:17+00	2017-03-20 09:46:17+00
2b00ee01-6459-41c6-ab59-6aec76a485ca	ornaments	2017-03-20 09:46:19+00	2017-03-20 09:46:19+00
94b2de49-b081-4dc9-acc3-f10ef8b6bf42	christmas	2017-03-20 09:46:19+00	2017-03-20 09:46:19+00
b9a11a81-6e75-4664-bad8-74d7d7350dd9	abstract-decorative	2017-03-20 09:46:19+00	2017-03-20 09:46:19+00
75f5b041-0f50-4f36-ba88-75e53255b8fa	fruits	2017-03-20 09:46:20+00	2017-03-20 09:46:20+00
6e8844be-b360-49bf-81ed-1284f82ae109	cherries	2017-03-20 09:46:20+00	2017-03-20 09:46:20+00
ab99b523-5a8b-464a-ac88-040f21c4ae62	snow-white	2017-03-20 09:46:21+00	2017-03-20 09:46:21+00
582aaf5e-0656-4059-967f-0b6c73752a59	apples	2017-03-20 09:46:21+00	2017-03-20 09:46:21+00
9dbf01d4-ebab-4ba2-916b-37cd9b13ad43	animals	2017-03-20 09:46:21+00	2017-03-20 09:46:21+00
164f79f5-d2ec-4f5a-aed1-a0be99a85795	forest	2017-03-20 09:46:21+00	2017-03-20 09:46:21+00
c2f00d40-f2cf-4ae7-81f2-4f1b2c7eab97	trees	2017-03-20 09:46:21+00	2017-03-20 09:46:21+00
ec3d8362-6dfc-4c21-a161-6f3d5fda75fc	white-rabbit	2017-03-20 09:46:22+00	2017-03-20 09:46:22+00
d3a21074-e48d-4443-acd5-e11cfbafdf96	cats	2017-03-20 09:46:22+00	2017-03-20 09:46:22+00
bf2736c4-0056-4517-82d8-cc05d2c2e4a8	bunnybears	2017-03-20 09:46:22+00	2017-03-20 09:46:22+00
034a7d78-2c42-441a-8eb9-b9eb2a66919e	furniture	2017-03-20 09:46:22+00	2017-03-20 09:46:22+00
6bddda82-3da0-4671-952c-da5d8b6dcbe2	daisies	2017-03-20 09:46:24+00	2017-03-20 09:46:24+00
72e592f8-bcc0-4b6f-a36e-c71e97f26c5b	bouquets	2017-03-20 09:46:24+00	2017-03-20 09:46:24+00
c8dfbb9e-aac2-4a7d-94d4-23553d600819	birds	2017-03-20 09:46:26+00	2017-03-20 09:46:26+00
b0aa776c-eda7-482f-8d48-2da2db150e3d	birdcages	2017-03-20 09:46:26+00	2017-03-20 09:46:26+00
cc925d7c-707f-4d34-8a2f-dcca88622ea9	cookies	2017-03-20 09:46:27+00	2017-03-20 09:46:27+00
29b84e71-56f0-4d95-8edd-948e545847e4	playing-cards	2017-03-20 09:46:27+00	2017-03-20 09:46:27+00
b4b7051e-a22e-4012-9c20-1252515004c9	marine	2017-03-20 09:46:30+00	2017-03-20 09:46:30+00
6492f5b1-e815-43c0-a3d7-d1897bb84cd3	grass	2017-03-20 09:46:33+00	2017-03-20 09:46:33+00
31fc1b44-0788-48f6-9edc-f1826f7bbce0	clouds	2017-03-20 09:46:33+00	2017-03-20 09:46:33+00
10e8bc10-e26a-478a-b7f9-263fb286ce3a	whipped-cream	2017-03-20 09:46:35+00	2017-03-20 09:46:35+00
4f05986b-e3ef-4ee2-ad27-b255883e4b64	ice-creams	2017-03-20 09:46:35+00	2017-03-20 09:46:35+00
9e86b439-c4f5-495a-8b7f-954af61d13db	bears	2017-03-20 09:46:37+00	2017-03-20 09:46:37+00
3010ad34-21c5-4df0-a4a5-cb6e1eee7a07	candy	2017-03-20 09:46:39+00	2017-03-20 09:46:39+00
13f05c97-ddce-4a9c-bd48-fa1877f2b852	beds	2017-03-20 09:46:39+00	2017-03-20 09:46:39+00
54f6e0dd-bc60-4e25-bacc-4a1bbd3b87d1	treasures	2017-03-20 09:46:43+00	2017-03-20 09:46:43+00
5c634064-b597-4c1b-8b18-ccbf67aee6f5	pirates	2017-03-20 09:46:43+00	2017-03-20 09:46:43+00
cae850b4-811f-4c21-9d87-222c3d7fb80f	musical-notes	2017-03-20 09:46:44+00	2017-03-20 09:46:44+00
82d98b84-7ca4-49d7-b09c-39cbe93707cb	jewels	2017-03-20 09:46:44+00	2017-03-20 09:46:44+00
e26cea64-2b6f-4a67-bb06-08177a6db0a9	keys-non-piano	2017-03-20 09:46:44+00	2017-03-20 09:46:44+00
93042fe7-b712-4174-b2a7-ff345e0e4aa6	skulls	2017-03-20 09:46:44+00	2017-03-20 09:46:44+00
8026e2b8-825f-4cf5-b061-7e9095c2c6fb	jacquard	2017-03-20 09:46:13+00	2019-12-21 10:35:00+00
e967aea5-ecc9-4661-ba28-c53ced6eb086	velveteen	2017-03-20 09:46:16+00	2019-12-21 10:35:24+00
963f404f-02ac-4ca7-9a67-d3c354e1aec4	regimental-stripes	2017-03-20 09:46:13+00	2019-12-21 11:26:19+00
2c1ab46d-4ab3-41c8-b5d5-afdc4749f622	pinstripes	2017-03-20 09:46:29+00	2019-12-21 11:26:48+00
60667b47-f661-4db0-ab56-74becad8d567	stripes	2017-03-20 09:46:10+00	2019-12-23 10:12:31+00
d5fb88f6-8ee0-4719-9682-911f1aa1e9c2	pom-pom	2017-03-20 09:46:32+00	2022-01-17 23:01:10+00
13c39cd7-9b84-49c6-b17f-ef8c2f9a9247	solid	2017-03-20 09:46:21+00	2019-12-27 12:11:56+00
959a0135-9d1a-4ed8-aa0f-8326dd261690	imai-kira	2017-03-20 09:46:25+00	2020-01-03 18:36:58+00
a244589a-1a2d-4977-86b3-c163600d05d7	coaches-carriages	2017-03-20 09:46:12+00	2020-02-03 19:54:51+00
4778ff65-9521-4f3c-9c79-17f896cf5e4d	lace	2017-03-20 09:46:16+00	2020-02-13 18:37:37+00
4d56a435-3e90-4bfc-aeed-ec9bbf7ca9e4	churches-cathedrals	2017-03-20 09:46:15+00	2020-10-05 22:00:42+00
d275af53-605d-4f78-8c23-cc9b88a44fea	embroidery	2017-03-20 09:46:20+00	2020-02-16 22:06:35+00
f3d80995-3dd3-460d-ad39-1a042c7e82d5	sailor	2017-03-20 09:46:30+00	2020-02-16 22:08:37+00
bb2b6a63-aa52-4235-bd8f-21e332d0994e	knitted	2017-03-20 09:46:37+00	2020-02-16 22:11:54+00
c738f3a4-ac46-4b9e-b4f9-89501fdd269f	rickrack	2017-03-20 09:46:28+00	2020-03-25 20:53:28+00
94d96cf4-bd36-4614-b091-2f7de813aaed	glitter	2017-03-20 09:46:23+00	2020-02-16 22:15:44+00
6aab9ef6-e7e1-4457-b819-3f0a6fc5a165	animal-ears	2017-03-20 09:46:34+00	2020-02-16 22:19:35+00
42ea103a-ec7e-4fc9-8e94-cca96fc652df	maid	2017-03-20 09:46:29+00	2020-02-16 22:21:10+00
14f4fd24-cf61-454e-95ea-61d9a8d76432	collaboration	2017-03-20 09:46:34+00	2020-02-16 22:23:46+00
04fd0dcd-e706-4b83-aab5-eb5500deba4a	applique	2017-03-20 09:46:27+00	2020-02-16 22:24:44+00
85f32a89-7fea-4d07-b60b-dcf53f045578	letters	2017-03-20 09:46:27+00	2020-02-16 22:26:17+00
adf4de04-f73d-4e59-884b-54b0661a7f01	rhinestones	2017-03-20 09:46:41+00	2020-03-11 20:22:30+00
ea72fb7f-f55f-410a-a659-580d731b59af	detail-bows	2017-03-20 09:46:11+00	2020-10-06 16:32:28+00
1ffe0b29-33e8-4ae8-8bef-0f9f1170b381	plaids	2017-03-20 09:46:20+00	2021-01-20 02:27:57+00
ab69d91c-67f6-469f-967e-4ce21f5ae939	pocket-watches	2017-03-20 09:46:44+00	2017-03-20 09:46:44+00
b3d0457b-ba5b-495a-8f26-afae76e9c7e8	anchors	2017-03-20 09:46:44+00	2017-03-20 09:46:44+00
5ceb8a7f-7d98-4197-ad07-1a4edaee6e7a	heraldry	2017-03-20 09:46:45+00	2017-03-20 09:46:45+00
d4f0390a-595c-4870-aa7a-feee080d4a85	diamonds	2017-03-20 09:46:46+00	2017-03-20 09:46:46+00
d806236c-3854-46bc-a474-7ac99aeb8a61	instruments	2017-03-20 09:46:47+00	2017-03-20 09:46:47+00
84c1d5c8-7ba8-4f64-8aa1-c2cb95649471	staircases	2017-03-20 09:46:49+00	2017-03-20 09:46:49+00
54b3df74-269f-40ba-adfc-dc8c19aca53a	angels	2017-03-20 09:46:51+00	2017-03-20 09:46:51+00
fbc9d213-e837-4c45-9ebc-1d9cc334a398	stained-glass	2017-03-20 09:46:51+00	2017-03-20 09:46:51+00
774c4752-36d5-4bda-a358-de2bdfcd552c	circus	2017-03-20 09:46:53+00	2017-03-20 09:46:53+00
758fd1d9-4248-4446-9448-1096ba8757c9	balloons	2017-03-20 09:46:54+00	2017-03-20 09:46:54+00
2535508b-c990-4666-a7b3-da6f85829566	fleur-de-lis	2017-03-20 09:46:54+00	2017-03-20 09:46:54+00
a65f1189-e16c-43b7-8d10-fa1ddcda6be2	wings	2017-03-20 09:46:54+00	2017-03-20 09:46:54+00
d88902b0-9164-4595-a15f-ffdce28f8c0f	moons	2017-03-20 09:46:58+00	2017-03-20 09:46:58+00
a2fbc8ea-5831-4fe1-921a-c15230a87683	theatre	2017-03-20 09:47:00+00	2017-03-20 09:47:00+00
190a6975-e382-4ad1-b20a-92c3d60c8007	poodles	2017-03-20 09:47:02+00	2017-03-20 09:47:02+00
cffc74ed-433f-47fe-afa6-f92e09fe1a24	lotv	2025-08-16 02:22:50+00	2025-08-16 02:22:50+00
2af2b193-c7b4-4781-bdf7-d1ef9f5ee194	carousels	2017-03-20 09:47:02+00	2017-03-20 09:47:02+00
5b36abc1-61d0-4153-b7f3-8f91936897c1	replica	2017-03-20 09:47:02+00	2017-03-20 09:47:02+00
09997f04-4899-4074-9f9d-031466302f89	mushrooms	2017-03-20 09:47:03+00	2017-03-20 09:47:03+00
5e4dcb60-545e-4191-bd57-24a685552618	pianos	2017-03-20 09:47:05+00	2017-03-20 09:47:05+00
9175810c-90fe-4acb-8b85-42d064b8e4f5	music	2017-03-20 09:47:05+00	2017-03-20 09:47:05+00
a5d19638-8b0b-4ece-acef-6aeaaa93d630	citanul	2025-10-19 23:37:25+00	2025-10-19 23:37:25+00
761f2b8a-af3e-4634-82fe-58d7d9bdaf21	spiderwebs	2017-03-20 09:47:06+00	2017-03-20 09:47:06+00
b26835ea-c268-47b4-801b-0171ef111da2	chains	2017-03-20 09:47:07+00	2017-03-20 09:47:07+00
b7a6c010-6e2b-4478-aad6-60a13c7174b5	bats	2017-03-20 09:47:08+00	2017-03-20 09:47:08+00
f025198a-76b9-43d6-9fce-1b0607e490b4	motif-feathers	2017-03-20 09:48:41+00	2026-01-21 17:41:25+00
1e78899d-ec72-48e8-a9ba-06a575901cd9	detail-feathers	2026-01-21 17:41:48+00	2026-01-21 17:41:48+00
2a678ffe-0422-4f30-ba53-0dde1fbc7528	spiders	2017-03-20 09:47:18+00	2017-03-20 09:47:18+00
cd6ec9da-f13a-4587-a7df-b43cbefd3f35	andromeo	2026-02-07 04:23:00+00	2026-02-07 04:23:00+00
f4292a67-e8e6-4c5a-83d8-5ad559761713	tea	2017-03-20 09:47:35+00	2017-03-20 09:47:35+00
38990061-0827-45a9-89d3-ef949c89ae50	cups	2017-03-20 09:47:35+00	2017-03-20 09:47:35+00
ae6d2068-4e7b-40c1-a10f-2a73b1289613	violins	2017-03-20 09:47:37+00	2017-03-20 09:47:37+00
254fd547-57bd-4624-948a-e8a97f92422d	squirrels	2017-03-20 09:47:42+00	2017-03-20 09:47:42+00
7e541d9c-ae73-4351-bc0b-d194dc9f5d62	sheep	2017-03-20 09:47:45+00	2017-03-20 09:47:45+00
dc8f3636-63e9-4c2b-b9f0-99b58b4f9331	lions	2017-03-20 09:48:15+00	2017-03-20 09:48:15+00
7b072ca1-3556-49c7-b118-cc62bdbfc8cc	plants	2017-03-20 09:48:33+00	2017-03-20 09:48:33+00
216ab08e-d139-410d-9f14-cc6b7027e06b	dolls	2017-03-20 09:48:34+00	2017-03-20 09:48:34+00
8cb3486a-3c32-4cd5-b48a-ebc1f047d40a	sleeping-beauty	2017-03-20 09:48:40+00	2017-03-20 09:48:40+00
9430230c-f046-435a-bf03-732773251928	cameos	2017-03-20 09:48:41+00	2017-03-20 09:48:41+00
cc84e20d-75cd-4b81-87ee-c08d9b5c3ff8	clubs	2017-03-20 09:48:42+00	2017-03-20 09:48:42+00
93444f7a-f41e-43e6-9c31-e04e75a9369c	spades	2017-03-20 09:48:42+00	2017-03-20 09:48:42+00
904872ab-3d8c-404c-aa97-d0019945b6fe	numbers	2017-03-20 09:48:43+00	2017-03-20 09:48:43+00
078d36ba-7645-4a50-8cbb-47555c4c0300	toys	2017-03-20 09:48:49+00	2017-03-20 09:48:49+00
8b6265e5-a2f8-4099-a7d3-2365d89ee879	halloween	2017-03-20 09:48:49+00	2017-03-20 09:48:49+00
a30b090a-3f7e-48c6-ab45-378cfa6e27bc	elephants	2017-03-20 09:48:52+00	2017-03-20 09:48:52+00
34793d93-33ca-400b-b057-ff45ac786694	ballerinas	2017-03-20 09:48:52+00	2017-03-20 09:48:52+00
fb3bf2f7-f2b0-4281-9659-752ee8e35495	ships	2017-03-20 09:48:53+00	2017-03-20 09:48:53+00
8f593035-b0cc-482f-b600-b51027bf558e	seashells	2017-03-20 09:48:53+00	2017-03-20 09:48:53+00
84238c3f-1388-4c4c-b3cb-f5dc47b9ad04	nursery-rhymes	2017-03-20 09:48:53+00	2017-03-20 09:48:53+00
2de9e121-5651-478c-8a39-4a4edc049ebe	books	2017-03-20 09:48:54+00	2017-03-20 09:48:54+00
ce947ad8-aaf1-42e0-8b24-7bc82274798f	chess	2017-03-20 09:48:59+00	2017-03-20 09:48:59+00
5cfcf9e5-a425-4541-9587-ab532506f644	macarons	2017-03-20 09:48:59+00	2017-03-20 09:48:59+00
85bfca68-43ba-4b66-89e7-8ef77e524dd7	pies	2017-03-20 09:49:04+00	2017-03-20 09:49:04+00
70072323-c877-4251-8ac3-f2d3609d133f	mermaids	2017-03-20 09:49:10+00	2017-03-20 09:49:10+00
d155164c-d71c-4370-abdb-b0ed0e988427	jams	2017-03-20 09:49:13+00	2017-03-20 09:49:13+00
6a9d0dcb-d98d-4787-9dfa-f1ddf95e86c5	chocolates	2017-03-20 09:49:14+00	2017-03-20 09:49:14+00
7172edc2-bdfe-4008-af88-4e495bff82bb	eiffel-tower	2017-03-20 09:49:22+00	2017-03-20 09:49:22+00
ceab0b21-0aef-4908-bfe6-8dba6a63999a	cutlery	2017-03-20 09:49:45+00	2017-03-20 09:49:45+00
71ee2101-150b-4f58-a2db-365029f22331	spoons	2017-03-20 09:49:51+00	2017-03-20 09:49:51+00
f32b774a-d0c1-475e-8c9c-17a2e5f3fdae	unicorns	2017-03-20 09:49:52+00	2017-03-20 09:49:52+00
df668af3-5c82-4a25-8076-bd053d8798cd	umbrellas	2017-03-20 09:50:16+00	2017-03-20 09:50:16+00
04dd7ad4-d36d-4926-8915-1c52704d1c2d	japanese-indie	2017-03-20 09:50:38+00	2017-03-20 09:50:38+00
ac29b233-3faa-4925-97d3-14d3ee739ffb	bubbles	2017-03-20 09:50:45+00	2017-03-20 09:50:45+00
d337f75a-4ca2-4312-b1fd-484179feaf8c	doughnuts	2017-03-20 09:50:46+00	2017-03-20 09:50:46+00
984ef551-6a4d-4602-8c44-5e4ffd17b329	royalty	2017-03-20 09:50:53+00	2017-03-20 09:50:53+00
8c213370-4984-43ed-9f75-d389f39f57e5	cinderella	2017-03-20 09:50:54+00	2017-03-20 09:50:54+00
a0085398-5d31-4d00-ab04-7f5b27e75808	lipsticks	2017-03-20 09:50:54+00	2017-03-20 09:50:54+00
2c0e20ff-09cb-4542-a5ab-5a1798e7c32b	snowflakes	2017-03-20 09:51:08+00	2017-03-20 09:51:08+00
724b2379-3daa-4cd2-a7ac-2f2290861d78	organdy-organza	2017-03-20 09:48:44+00	2019-12-21 09:14:32+00
d12916ca-4ba4-4b37-9e6a-5e4f9527fb5d	argyle	2017-03-20 09:47:21+00	2019-12-27 11:59:47+00
b471d546-4626-42f4-9e99-351fcf54595a	camo	2017-03-20 09:47:10+00	2019-12-27 12:00:49+00
4df05feb-9688-4c7b-9974-0d40ac2bfc15	houndstooth	2017-03-20 09:47:15+00	2019-12-27 12:09:16+00
3674697a-ae1e-4188-81b4-8dc699894a35	acrylic-resin	2017-03-20 09:49:50+00	2019-12-27 12:10:18+00
0fe23d8f-74bf-46d6-b8d8-26c3a4c24834	denim	2017-03-20 09:48:46+00	2019-12-27 12:12:28+00
a136fdf2-702e-427e-b5cb-5096a5a26cad	novala-takemoto	2017-03-20 09:49:14+00	2020-01-03 18:35:56+00
54d0c06d-faeb-4b24-b0ee-74d04d7d0a5b	witches-magic	2017-03-20 09:46:58+00	2020-02-03 19:51:25+00
fe69cd09-d2c4-4182-a241-cac26f2335e8	gifts	2017-03-20 09:48:59+00	2020-02-16 21:57:21+00
e4437025-c44f-40d1-abca-31e7d8aa6261	choker	2017-03-20 09:49:30+00	2020-02-16 21:58:28+00
e3c2268f-6977-4aaf-9106-1685bcf4cc16	hairclip	2017-03-20 09:48:57+00	2020-02-16 21:58:42+00
a85026f7-a04f-40fd-a578-95bd475e539f	cupcakes	2017-03-20 09:48:41+00	2020-02-16 22:14:09+00
90298b53-5960-4b91-9571-7ff0545a5ba4	canotier	2017-03-20 09:49:11+00	2020-02-16 22:16:01+00
77a18fde-ee4c-4ebd-a84d-9cab54f69526	motif-hats	2017-03-20 09:47:09+00	2021-05-18 18:27:38+00
8b30ccf3-b11d-4067-a877-cc9b1b6ab482	military	2017-03-20 09:47:08+00	2020-02-16 22:16:43+00
558f4b51-2094-47f0-a558-4415fbc79264	wrist-cuffs	2017-03-20 09:47:09+00	2020-02-16 22:20:39+00
655a77a7-0d31-4fcb-808a-ec1bc3391175	dogs	2017-03-20 09:47:05+00	2020-10-05 22:05:21+00
27b9a3b1-46c7-4439-bf86-21f6e7f18f0e	apron	2017-03-20 09:46:44+00	2020-02-16 22:21:42+00
aa666862-3dc3-48bc-929c-666ee9889285	crown-label	2017-03-20 09:47:32+00	2023-04-15 02:21:35+00
1b14b999-2f4a-4d3d-9bfa-a536ca339bfa	beads	2017-03-20 09:49:50+00	2020-02-16 22:23:17+00
17d38bc2-6f4f-47f3-98e6-4cf3e767579f	astronomy-space	2017-03-20 09:51:08+00	2020-02-16 22:29:42+00
45db235f-2761-4755-9cd8-ea632b1f79ce	lacy	2017-03-20 09:48:32+00	2020-06-16 13:45:49+00
f3d6dae7-fa1f-4652-ac96-e41604e9819a	horses-ponies	2017-03-20 09:48:43+00	2020-10-05 22:13:47+00
97726e25-dd5e-4dff-a852-4f599497db61	violets-pansies	2017-03-20 09:47:26+00	2020-10-05 22:16:16+00
8e43623d-26fe-4dc2-ba13-ff0200b0fb98	gobelin	2017-03-20 09:47:07+00	2020-10-06 16:29:44+00
209fa323-d81f-4a14-862d-b181e2df9411	bonnets	2017-03-20 09:48:36+00	2022-11-23 18:21:29+00
b561e47d-a6d7-463c-b723-735b59444001	cosmetics	2017-03-20 09:50:14+00	2023-05-12 17:10:11+00
b25a08b2-8abb-4d3c-837c-6f651735b0aa	clothing-and-shoe-prints	2017-03-20 09:50:46+00	2023-05-13 03:37:40+00
258fe6f0-9224-4cb9-91f4-8187fc69f0f3	fans	2017-03-20 09:51:15+00	2017-03-20 09:51:15+00
75e0fde4-da03-46b0-8933-71f37df9e1bc	hnfrill	2026-01-04 02:39:47+00	2026-01-04 02:39:47+00
fcbd1189-918a-41d2-9e96-761b4bd4de0f	buildings	2017-03-20 09:52:23+00	2017-03-20 09:52:23+00
48c1912d-7660-4c32-8033-85e690d86417	fairies	2017-03-20 09:52:54+00	2017-03-20 09:52:54+00
589e877b-bcbc-410a-a303-54af1ff0f629	masks	2017-03-20 09:53:06+00	2017-03-20 09:53:06+00
d86a7b2f-2457-4018-a5ac-fecad9d1a209	motif-mirrors	2017-03-20 09:46:22+00	2026-01-21 17:42:44+00
f61c7697-6ab4-437d-b3e8-f6c0b6bf43f5	tarot	2017-03-20 09:55:06+00	2017-03-20 09:55:06+00
84f19366-1076-4cbb-ae26-b30dd6f893e6	gloomy-bear	2017-03-20 09:55:25+00	2017-03-20 09:55:25+00
9d8d799a-6e93-424b-a0ba-4cd0a8cfb776	coffins	2017-03-20 09:55:31+00	2017-03-20 09:55:31+00
0184ac6f-3d84-4b7f-bd84-af44b07bf376	kuragehime	2017-03-20 09:58:40+00	2017-03-20 09:58:40+00
3ab7fa9e-0219-4418-84dd-28898c3cda44	religious-motifs	2017-03-20 09:59:16+00	2017-03-20 09:59:16+00
edd99c4e-caa2-46ae-85b5-86f1879be3a5	plates	2017-03-20 10:00:42+00	2017-03-20 10:00:42+00
5b55d2ef-d295-41b2-bcd8-cba97003a7c1	western-indie	2017-03-20 10:01:26+00	2017-03-20 10:01:26+00
67f0bb4f-d4ea-454c-bc65-0e77e7d68308	raspberries	2017-03-20 10:04:16+00	2017-03-20 10:04:16+00
4e536381-e94a-4250-bf61-478c8ef0e0c8	dolphins	2017-03-20 10:08:01+00	2017-03-20 10:08:01+00
84faadf0-73a0-4fda-9312-8d8d9a44ff13	disney	2017-03-20 10:08:47+00	2017-03-20 10:08:47+00
959a70e3-06fd-4acc-9a65-1ff931c03a32	paintings	2017-03-20 10:09:39+00	2017-03-20 10:09:39+00
5d13dd7f-5301-4338-855a-8e090d79a943	arts	2017-03-20 10:11:07+00	2017-03-20 10:11:07+00
0f393374-49bc-47f1-83aa-496b86f6d242	print-replica	2017-03-20 10:13:36+00	2017-03-20 10:13:36+00
903c3cf3-536a-4442-b3b9-7f54c3fbde33	forks	2017-03-20 10:14:52+00	2017-03-20 10:14:52+00
ed56a3dc-6ae4-4e83-ae1c-5a9657c024d6	motif-beads-pearls	2026-03-30 16:42:03+00	2026-03-30 16:42:03+00
545feed3-b37d-4865-8879-c3dc0c630b39	foxes	2017-03-20 10:18:55+00	2017-03-20 10:18:55+00
4967fcc9-56b0-4711-860d-06798229e095	loveliness-studio	2026-04-22 02:42:24+00	2026-04-22 02:42:24+00
eef94723-6994-4e53-b3c1-bb6149d5fe6c	peace-now	2026-04-22 03:10:32+00	2026-04-22 03:10:32+00
a6a4f9ca-0567-4110-a9e0-ed8089e061a9	laurels	2017-03-20 10:20:25+00	2017-03-20 10:20:25+00
0db4ef1f-effb-4d29-b917-574a470e51b3	korean-indie	2017-03-20 10:20:29+00	2017-03-20 10:20:29+00
d841132c-c3ea-4a8e-95a3-f718a21752c4	doors	2017-03-20 10:21:54+00	2017-03-20 10:21:54+00
f2f15f12-e333-41a4-954c-af6c2e75ae14	hands	2017-03-20 10:24:04+00	2017-03-20 10:24:04+00
54de7f53-958c-488c-9f03-2b0f3049069b	eyes	2017-03-20 10:25:48+00	2017-03-20 10:25:48+00
8d0cb50e-2a4b-4636-afac-a9bc1002fc90	creamy-mami	2017-03-20 10:28:42+00	2017-03-20 10:28:42+00
afca0316-fdad-48de-a207-a77dd8464ad0	mice	2017-03-20 10:44:11+00	2017-03-20 10:44:11+00
aafdb820-cbef-4f2e-a23c-b263c2b07c8e	chinese-indie	2017-03-20 10:45:11+00	2017-03-20 10:45:11+00
510c43cb-2618-4d37-abed-1fe660631f17	snow-globes	2017-03-20 10:45:14+00	2017-03-20 10:45:14+00
6a1a4ace-d5e0-45c6-8e7a-cbe766abe71c	peter-pan	2017-03-20 10:48:23+00	2017-03-20 10:48:23+00
dc0a8b4b-083a-468a-b01d-7196e43a1139	phantom-of-the-opera	2017-03-20 10:51:42+00	2017-03-20 10:51:42+00
2fe741d5-7743-407b-bb44-64240ef5fd96	puppets	2017-03-20 10:59:59+00	2017-03-20 10:59:59+00
ba308f5d-3492-40a9-a622-40a141402c6b	weddings	2017-03-20 11:07:47+00	2017-03-20 11:07:47+00
1635480b-17d9-49a6-9cfd-2c1a39226829	pegasus	2017-03-20 11:31:16+00	2017-03-20 11:31:16+00
713a3325-daa6-4193-adb2-0e2d54271ee8	little-red-riding-hood	2017-03-20 11:38:11+00	2017-03-20 11:38:11+00
a1e8f6d6-8256-4272-a43f-6007f7fbd604	leather	2017-03-20 10:15:50+00	2019-12-27 12:01:45+00
5e4e4472-c68d-4681-b023-cb14c217c9f2	toile	2017-03-20 09:51:58+00	2019-12-27 12:08:42+00
189fcdc1-067e-4c8f-9a2c-e83e35236849	shotgun-wedding	2017-03-20 10:25:23+00	2022-09-20 14:06:42+00
f019c054-1904-49d7-ae4e-332bd2946ccc	fanplusfriend	2017-03-20 11:12:09+00	2020-01-03 18:30:11+00
f6aa50fc-c64e-46ce-8abf-b9ab47251a89	magic-potion	2017-03-20 10:45:11+00	2020-01-03 18:30:55+00
dceb49ec-f180-412c-9669-57b686fe7759	cherie-cerise	2017-03-20 11:26:02+00	2020-01-03 18:33:22+00
3c6e9b58-d567-4d96-a289-44fce7e0adf6	rings	2017-03-20 09:51:32+00	2020-03-11 20:23:12+00
be8b93cd-f53a-44ae-8e58-76c9198ef34a	magic-tea-party	2017-03-20 11:10:12+00	2020-01-03 18:34:43+00
b0896a36-cf23-497a-881a-9911b37e37be	lustyn-wonderland	2017-03-20 10:01:25+00	2020-01-03 18:34:47+00
a54ffece-5faa-46c9-a1af-9a62db5fb735	the-snow-field	2017-03-20 10:52:08+00	2020-01-03 18:35:31+00
9cbb71a1-a868-4fbe-a7e1-24feaa2b9512	boguta	2017-03-20 10:45:07+00	2020-01-03 18:36:21+00
95b48c4b-d6d2-4208-9247-8e61adf39a85	pumpkin-cat	2017-03-20 10:52:04+00	2020-01-03 18:36:27+00
8a439fa9-423c-4216-ba72-13b401db3e44	kidsyoyo	2017-03-20 10:37:58+00	2020-01-03 18:37:31+00
7d32c077-4354-45c4-bce1-b98a7dbf892f	r-series	2017-03-20 10:27:34+00	2020-01-03 23:04:22+00
7b3dd3ff-198c-4e06-a9fc-483eb8a7f650	lethes-castle	2017-03-20 10:47:34+00	2020-01-03 23:05:09+00
71f32f96-2573-4ca5-bed5-9f89f67d6810	were-all-mad-here	2017-03-20 11:23:33+00	2020-01-03 23:06:02+00
62e4ee22-e10a-470a-bb79-2294c85dcebe	marchenmerry	2017-03-20 10:28:59+00	2020-01-03 23:08:04+00
5ffe3a83-30e8-44aa-b161-539625659856	mystery-garden	2017-03-20 10:58:09+00	2020-01-03 23:08:07+00
2b129174-161e-4919-a986-8b21485da293	dark-box	2017-03-20 10:52:22+00	2022-09-22 16:19:40+00
9a4d8906-98fa-4a8e-91be-f011d7134b71	scrunchie	2017-03-20 09:54:36+00	2022-11-23 18:18:20+00
1e21c4ee-a745-4609-ae4d-f716871c3abb	spica	2017-03-20 10:21:57+00	2020-01-03 23:09:58+00
fbb1a252-e442-4e8e-b188-9fa767423d72	ptmy	2017-03-20 10:22:02+00	2022-09-20 14:01:01+00
07988043-c876-4295-9110-264244c0bc48	elpress-l	2017-03-20 11:27:41+00	2020-01-03 23:10:45+00
05ce0cf3-8358-4465-b408-c9e0daab384f	fairy-wish	2017-03-20 10:44:24+00	2020-01-03 23:10:50+00
05610265-fcde-4efd-89ed-7a413d634420	mew	2017-03-20 10:19:45+00	2020-01-03 23:10:56+00
46934c25-bdae-4472-b1ab-c6d170d9487a	gramm	2017-03-20 10:24:03+00	2022-09-22 16:19:57+00
d5869c48-5d65-43ea-8c73-179745cb6172	necklace	2017-03-20 09:51:31+00	2020-02-16 22:06:07+00
f4fd2742-16a4-4fef-827d-ec57fd313c3c	gloves	2017-03-20 09:57:43+00	2020-02-16 21:59:11+00
c804f702-8b58-42d0-a7a9-89e8f8780e2b	nurse	2017-03-20 10:26:47+00	2020-02-16 22:08:03+00
ac069808-12bd-4339-bd18-0a944d73da9d	bracelet	2017-03-20 09:51:32+00	2020-02-16 22:13:12+00
abf6935b-8032-4e52-9e50-e1189c629512	earrings	2017-03-20 09:57:43+00	2020-02-16 22:13:35+00
a9c2cbbf-f0a9-4f18-a5e8-021c6af29866	gilet	2017-03-20 10:02:47+00	2020-02-16 22:13:42+00
86cfb6fc-767e-41ac-9fdb-ce81fc98f104	hmhm	2017-03-20 11:14:31+00	2020-02-16 22:17:01+00
0576b53a-c59f-4682-9b2f-1415b043265b	brooches	2017-03-20 10:27:33+00	2022-11-23 18:22:19+00
7e4be614-7dff-4582-be52-90baacdc54a6	recalled	2017-03-20 10:22:25+00	2020-02-16 22:17:57+00
759fb641-c6ab-4dee-80c1-0557b9676d4b	arm-warmers	2017-03-20 09:58:16+00	2020-02-16 22:18:28+00
72b53869-f3da-4f88-8126-056df30e1057	tassels	2017-03-20 09:53:03+00	2020-02-16 22:18:35+00
6d991b39-5b78-42f9-9490-3188b2e3d26e	shoes-print	2017-03-20 09:53:38+00	2023-05-12 17:05:40+00
137c117d-f0b5-4057-8507-322a4105f86e	lapin-agill	2017-03-20 10:20:24+00	2022-09-20 13:59:02+00
f62d5937-8b6d-4f5e-9fb8-e0f90703d598	strawberry-on-the-shortcake	2017-03-20 10:47:12+00	2020-03-12 02:13:45+00
6e6620da-bc81-416c-bae1-955a3974979d	white-moon	2017-03-20 11:16:17+00	2020-03-12 02:14:39+00
18e282f2-dc5a-4222-a03d-4320d7863b93	cloud-chamber	2017-03-20 11:11:03+00	2020-10-06 16:28:47+00
657bdb91-7157-4242-81eb-928f7a2d333b	baroque	2017-03-20 10:19:42+00	2021-04-07 15:55:50+00
cfa01ebf-44a9-44fc-a914-4f555e17ecd5	mam	2017-03-20 10:39:20+00	2022-07-22 17:59:40+00
2187df4b-282c-4186-aa2a-3f8011f27ffc	sunglasses	2017-03-20 10:48:19+00	2023-05-12 17:06:37+00
e10da7a8-277a-4d9e-80a7-7cab5020c027	purses-print	2017-03-20 10:14:57+00	2023-05-12 17:07:16+00
81d371a5-ed25-47db-9d4b-ecb285ae5872	harps	2017-03-20 11:47:06+00	2017-03-20 11:47:06+00
4931a57b-e5df-4463-8d9c-f393f696e173	gears	2017-03-20 11:50:35+00	2017-03-20 11:50:35+00
da1fc3d9-fe79-4e37-b74e-280d20b427bf	the-nutcracker	2017-03-20 12:06:28+00	2017-03-20 12:06:28+00
42a02dcc-7aba-4db3-96f8-f63dcb3fb25f	the-little-mermaid	2017-03-20 12:15:40+00	2017-03-20 12:15:40+00
5352a8a1-ae65-425e-a1df-d72b8e53a043	beauty-and-the-beast	2017-03-20 12:15:41+00	2017-03-20 12:15:41+00
69768313-fab6-40ae-a862-66bd8a1d0b5c	rapunzel	2017-03-20 12:15:47+00	2017-03-20 12:15:47+00
c4c439f6-bdbf-43dd-9efe-ebf535332fa7	lollipops	2017-03-20 13:24:01+00	2017-03-20 13:24:01+00
9f233f03-23ea-4a43-80ed-1dc6cc147bf5	bread	2026-01-22 23:29:46+00	2026-01-22 23:29:46+00
e11f41ef-e9a7-4574-ae35-bfefb00c54fc	amavel	2026-04-22 03:03:03+00	2026-04-22 03:03:03+00
2edf7bbb-39f9-4f90-aee4-4b1476a93d23	doves	2019-12-21 09:07:07+00	2019-12-21 09:07:07+00
21c2f99b-c3a4-4524-9f6c-590444596104	chiffon	2017-03-20 09:46:16+00	2019-12-21 09:12:53+00
c807ad8e-86e3-4352-8c46-63303a2c2983	faux-fur	2017-03-20 09:47:08+00	2019-12-21 09:13:19+00
20d3f0f3-a98c-45d7-a2c8-adb29ae4df83	synthetic-leather	2019-12-20 20:54:48+00	2019-12-21 09:13:43+00
61f8be95-829a-44ab-a146-58d750e77d47	crepe de chine	2019-12-21 09:31:41+00	2019-12-21 09:31:41+00
fa15a4ef-9b01-42d7-b4c4-81c143de8c5f	satin	2019-12-21 10:00:18+00	2019-12-21 10:00:18+00
81bd4871-5340-4eb0-9467-c2b03d265288	broadcloth	2019-12-23 18:26:53+00	2019-12-23 18:26:53+00
e7e024ca-72b0-46c2-afe0-796c2d300069	butcher	2019-12-23 19:11:49+00	2019-12-23 19:11:49+00
f33fea20-4c70-40cd-9af9-91819f2134f4	twill	2019-12-23 18:08:47+00	2019-12-23 19:12:07+00
9e2ede1e-6847-4bd4-b2b8-2e0fef3acdc8	animal-print	2017-03-20 09:48:44+00	2019-12-23 21:09:23+00
1ad9ec2a-58c3-483e-aca7-66de7886b2a0	pillows	2019-12-25 19:43:45+00	2019-12-25 19:43:45+00
a4be4a43-fc8e-4ceb-ad54-d18e819a1f4d	lamps-not-chandeliers	2019-12-25 19:45:03+00	2019-12-25 19:45:03+00
c3ae7c35-17dd-4f68-a26d-8a9bbc4ec32b	sleepyland	2026-04-22 04:00:18+00	2026-04-22 04:00:18+00
7a2f96ca-d48e-4b6c-bc29-15a42d1154a1	partial	2017-03-20 09:46:13+00	2019-12-27 12:07:26+00
09c8a2c1-36ac-4050-b4f8-9de25dde2114	polka-dots	2017-03-20 09:46:14+00	2019-12-27 12:13:00+00
dea6fcc5-dfc9-4e93-8016-b1a33ed178cb	burberry	2019-12-27 15:55:28+00	2019-12-27 15:55:28+00
87ee31de-bf06-4802-881b-6d41dde2a0b7	curtains-drapes	2019-12-27 17:40:53+00	2019-12-27 17:40:53+00
7f292148-671b-47b2-a0b4-bfdff33283af	flags	2019-12-27 17:48:35+00	2019-12-27 17:48:35+00
61aff707-1ec0-402d-a382-04db8d1e7408	wool	2019-12-30 19:19:04+00	2019-12-30 19:19:04+00
ff5b6c81-5d78-4306-a554-799fa02744f7	reindeer-deer-bambi	2017-03-20 09:46:21+00	2020-01-02 15:08:41+00
13985661-d18e-469e-a476-e6b1b4b69299	bathrooms	2020-01-03 16:01:45+00	2020-01-03 16:01:45+00
f824cf09-ccc4-4d13-8f56-ec51c32572f1	marchen-die-prinzessin	2017-03-20 12:05:37+00	2020-01-03 18:28:32+00
d36d042c-8884-4c22-afe1-6dcbc1095d4a	schwarz-schmetterling	2020-01-03 12:59:54+00	2020-01-03 18:33:26+00
c7299dbe-21cd-4d22-81eb-c86c7d33d43e	chocomint	2018-09-05 19:34:07+00	2020-01-03 18:33:59+00
9aad6f2c-a07e-492f-99a0-84151f2f2f53	little-chili-shop	2017-03-20 10:47:38+00	2020-01-03 18:36:24+00
858c1323-7299-4414-8efa-b2bd782d3f4f	pina-sweetcollection	2017-03-20 09:50:35+00	2020-01-03 18:37:47+00
7c0a6ccf-56ae-4fcc-b299-c9073d4620b6	rose-trianon	2017-03-20 11:01:46+00	2020-01-03 23:05:03+00
795ec298-b337-4479-8209-1ecfb49bc7a2	automatic-honey	2021-07-20 20:53:35+00	2021-07-20 20:53:35+00
2ff33588-c576-4919-b765-8b8022e92f89	swimmer	2017-03-20 11:38:17+00	2020-01-03 23:08:33+00
0eec7034-789e-4bba-9199-41457c13dd65	dear-margaret	2017-03-20 10:20:02+00	2020-01-03 23:10:38+00
d2f05649-7adc-40b4-a20e-3dd71f99e1ee	east-asian	2020-01-14 17:40:41+00	2020-01-14 17:40:41+00
056db6ae-9eda-403e-8630-0bc09aa58943	damask	2020-01-14 18:14:58+00	2020-01-14 18:14:58+00
3c8f47ea-c67b-45e0-b61b-48a75b78f35d	violet fane	2020-01-23 22:05:18+00	2020-01-23 22:05:18+00
de414a89-16df-4cb6-aca2-fc795415d8bc	shantung	2020-02-08 18:51:20+00	2020-02-08 18:51:20+00
9d679cea-1dc6-43ab-84db-4308ab88bf69	lace-print	2020-02-13 18:31:59+00	2020-02-13 18:31:59+00
cfe1fb80-23b2-4238-8125-3b9bbb6de577	shoe-clips	2017-03-20 09:55:03+00	2020-02-16 22:07:07+00
9a50e334-7852-4e30-9aea-5fe677cf205b	flocking	2020-02-11 18:23:49+00	2020-02-16 22:14:50+00
1e615461-f8e5-4627-ac8b-c27afe84ea54	plastic	2017-03-20 09:51:31+00	2020-02-16 22:23:26+00
14f4cf79-1d20-49fb-8d78-937f458dac31	lucky-pack	2017-03-20 09:50:20+00	2020-02-16 22:23:58+00
d3ec78f2-7115-4b5b-9bf4-d0e88d1816b8	abilletage	2020-02-17 04:21:05+00	2020-02-17 04:21:05+00
adb47b96-96d6-4d16-bafa-49efac3108cd	morun-x-muuna-stoik	2020-02-18 06:26:41+00	2020-02-18 06:26:41+00
6af0c4fc-f05a-46ad-823c-8a0f37081084	Tulle	2020-02-24 10:34:32+00	2020-02-24 10:34:32+00
25a748ac-5490-4638-bdbd-31f9f94d4f17	easter	2020-03-18 19:53:26+00	2020-03-18 19:53:26+00
810314ff-b250-4e7b-8c38-4b745a526967	lemons	2020-03-23 21:17:38+00	2020-03-23 21:17:38+00
13be8970-32e7-4435-b91f-698abc6b2e1c	gradient	2020-03-26 21:40:31+00	2020-03-26 21:40:31+00
3d25977c-fe58-4e23-95f1-1f0912e5f20e	horoscope-astrology	2020-03-27 07:58:59+00	2020-03-27 07:58:59+00
204a527a-1b29-4344-8307-188d50b206b4	kazuko-ogawa	2020-09-11 18:30:42+00	2020-09-11 18:30:42+00
ccbebff1-c82e-47e9-ba1e-7fd7a7649866	wolves	2019-12-27 11:57:31+00	2020-10-05 22:17:40+00
f965ffb7-74d5-4fd8-ac5b-7180404248c1	brand-classical-lolita	2017-03-20 10:15:49+00	2020-10-06 16:28:01+00
c58a7438-185a-4164-b604-22333329b6a9	motif-ribbons	2020-02-13 18:33:33+00	2020-10-06 16:33:04+00
2a01e5a5-36ae-40c6-84fa-7ab4b417269c	ange	2020-10-16 01:15:27+00	2020-10-16 01:15:27+00
0db54482-a318-47f6-ae2b-84d37c5e0dc3	gingham	2021-01-20 02:28:43+00	2021-01-20 02:28:43+00
bd461446-f28a-45b4-baa8-79f54639a7a8	sole-wood	2021-02-10 23:52:30+00	2021-02-10 23:52:30+00
25b480f5-48b9-445b-93de-cc2d26e32dbe	sole-rubber	2021-02-10 23:53:04+00	2021-02-10 23:53:04+00
01e8acfb-93aa-4836-82c7-09a817c0e526	sole-foam	2021-02-10 23:53:23+00	2021-02-10 23:53:23+00
b9e47d6a-a543-4d2c-9f2a-92e35d483c1f	canvas	2021-02-10 23:54:48+00	2021-02-10 23:54:48+00
023e3f85-40ca-4ab0-965f-de2749c8ca29	matte	2021-02-10 23:56:11+00	2021-02-10 23:56:11+00
111d14e4-8aaa-4509-82f4-fd9f3a2f00fc	glossy	2021-02-10 23:56:40+00	2021-02-10 23:56:40+00
11fa9af8-353d-4c30-8b1b-43b477e93d2a	suede	2021-02-11 02:01:35+00	2021-02-11 02:01:35+00
40f72ec4-3f0d-42c0-8a4c-040956229cbb	sole-cork	2021-02-11 03:03:37+00	2021-02-11 03:03:37+00
3750a78a-5976-49ca-b205-f6bbac64975c	uf	2021-02-20 01:00:23+00	2021-02-20 01:00:23+00
01394c41-3bae-4df6-899e-9e9930fe02fd	seraphim	2021-02-22 23:37:07+00	2021-02-22 23:37:07+00
8f8eccac-d7bb-4032-b73c-e851fe381030	sensitive-content	2021-03-23 21:17:40+00	2021-03-23 21:17:40+00
37ff5c0e-f635-4e86-9072-8df0176526ec	pretty	2021-03-24 22:39:27+00	2021-03-24 22:39:27+00
fa292233-6a0c-4378-a83b-a67c732f8a85	straw-wicker	2021-03-25 01:29:44+00	2021-03-25 01:29:44+00
52331933-6c7a-4623-8ee3-28ab7145231f	russian-indie	2021-04-07 17:35:51+00	2021-04-07 17:35:51+00
e013d9b6-7b13-40f4-8e99-fa6a74f6a5d2	elegy	2021-04-09 00:55:16+00	2021-04-09 00:55:16+00
d2e25328-0a2c-414f-93a3-2ffa9ac1875e	item-hat	2021-05-18 18:27:53+00	2021-05-18 18:29:35+00
aeb340c7-31ea-4f9c-8932-7c5cf67daae0	A-Plus-Lidel	2021-07-15 14:25:24+00	2021-07-15 14:25:24+00
3d584723-b691-4fa5-9689-ece285f61468	diamond-honey	2021-07-20 20:54:00+00	2021-07-20 20:54:00+00
7130552e-4b7d-4fb7-b2a6-981a74ac172b	headbands	2017-03-20 09:46:22+00	2022-11-23 18:21:10+00
1dcd303c-ab56-41c0-a668-5daa73a86460	veils	2017-03-20 12:01:00+00	2022-11-23 18:21:57+00
0b9279b6-863c-4d23-a7a1-b8ef4a041e14	sweet-mildred	2021-07-20 20:54:20+00	2021-07-20 20:54:20+00
2ffb943a-efa7-4120-8996-d75818ee3924	fantastic-wind	2021-07-20 20:55:38+00	2021-07-20 20:55:38+00
c5f94629-0062-4ffb-84db-a88cb5009494	vierge-vampur	2021-07-20 20:56:00+00	2021-07-20 20:56:00+00
fee03109-8754-4a33-879d-2cd7d8b2f9e6	miss-point	2021-07-20 20:56:20+00	2021-07-20 20:56:20+00
89da885e-4487-4e7c-8f0c-e16ea45aebce	arcadian-deer	2021-07-20 20:56:39+00	2021-07-20 20:56:39+00
08fb8d3e-ee0a-4312-9923-4dbe9c6dd7cf	r-r-memorandum	2021-07-20 20:57:09+00	2021-07-20 20:57:09+00
98814024-ac97-47a9-8b19-9feb14cd05ee	long-ears	2021-07-20 20:57:38+00	2021-07-20 20:57:38+00
7012ef73-54a3-495f-9751-7801766b4841	dolly-house	2021-07-20 20:57:49+00	2021-07-20 20:57:49+00
3dd565c3-73d4-442a-a633-ddc7b7660984	me-likes-tea	2021-07-20 20:57:59+00	2021-07-20 20:57:59+00
3711838d-d5d0-42ce-a615-31487c6efa27	lumiebre	2021-07-20 20:58:17+00	2021-07-20 20:58:17+00
2016812a-3bcd-45df-a8c1-b1a1d7660bb5	to-alice	2021-07-20 21:08:12+00	2021-07-20 21:08:12+00
5e0b0018-79a9-4adc-9b1c-e5691ec25bda	lullaby	2021-07-20 21:09:29+00	2021-07-20 21:09:29+00
c27916ee-781d-4113-9edb-0c543d151176	item-mirror	2026-01-21 17:37:52+00	2026-01-21 17:37:52+00
c1b52295-d1ed-4293-9980-05caf47d6749	eat-me-ink-me	2021-07-20 21:34:04+00	2021-07-20 21:34:04+00
ad686d33-8cda-4b38-b381-7a922aa35a30	tournewsoul	2021-07-20 21:35:36+00	2021-07-20 21:35:36+00
68b435c9-1c3f-41e2-9114-4b2c91a87b9f	dandy-pupps	2021-07-20 22:15:06+00	2021-07-20 22:15:06+00
7a04cf8a-3901-40a7-ad0d-182bf348cfbe	strawberry-witch	2021-11-02 19:57:10+00	2021-11-02 19:57:10+00
e79bf65d-9e51-4ee5-91bc-1301b1159220	keychain	2026-02-07 03:25:15+00	2026-02-07 03:25:15+00
acc3d253-4b8e-4003-9f6d-fed28e884c6d	axes-femme-kawaii	2022-01-07 04:34:37+00	2022-01-07 05:00:46+00
0cb1a194-e0dc-43a9-a73f-d60d44ddea81	axes-femme-poetique	2022-01-07 05:01:56+00	2022-01-07 05:01:56+00
94fb064a-25cc-4169-b768-a3aa8456382d	axes-femme-nostalgie	2022-01-07 05:02:48+00	2022-01-07 05:02:48+00
4f340ddf-e627-4d7f-807e-7a19fbdad7b3	axes-femme-kids	2022-01-07 05:03:05+00	2022-01-07 05:03:05+00
9eccd854-74a2-42e3-bd3f-f721b1436e81	corduroy	2022-03-15 01:35:45+00	2022-03-15 01:35:45+00
934310c3-51e6-4a34-b6af-ad8543e76421	aguglieria	2022-03-15 01:41:45+00	2022-03-15 01:41:45+00
f6565864-d9d4-427d-92ad-eeeb628e272d	blood	2022-07-13 19:08:48+00	2022-07-13 19:08:48+00
b134365f-6cd6-4ea4-8a34-8bd67ac6c31d	fur	2022-08-23 18:13:47+00	2022-08-23 18:13:47+00
380171a6-7296-4678-ad44-ab8cc589c6fc	ma	2022-08-31 18:26:49+00	2022-08-31 18:26:49+00
301d7f4c-081d-4154-b068-161bf0e59973	na-th	2022-08-31 18:27:20+00	2022-08-31 18:27:20+00
275193d3-b21e-4562-a8be-3ef2af28975a	vallee-lys	2020-02-06 05:58:16+00	2022-09-20 13:59:28+00
a80fab5d-74c9-4731-89b5-1e7450b64324	visible	2022-10-13 22:00:39+00	2022-10-13 22:00:39+00
568a7b2e-30ac-4fd6-8746-f5b6a586c026	classical-puppets	2022-10-18 20:37:52+00	2022-10-18 20:37:52+00
5e623ac8-9764-4a79-ac35-5b6408af96f8	little-dipper	2022-10-18 20:51:36+00	2022-10-18 20:51:36+00
3caa67e0-6937-4d53-9417-b7e4c56edca0	coquette-doll	2022-11-22 17:48:49+00	2022-11-22 17:48:49+00
1e88d3eb-7a32-422d-9116-522cff35fdbc	comb	2022-11-23 18:25:04+00	2022-11-23 18:25:04+00
f27862e1-7cfd-452d-9df9-2082990a74dd	sanrio	2022-12-02 15:45:20+00	2022-12-02 15:45:20+00
6c8c228f-24f0-4cb5-a6b3-3f7aec1915eb	mille-noirs	2023-05-09 14:29:43+00	2023-05-09 14:29:43+00
548c1595-aa23-40b4-b7db-5663a1cdb58f	moonrise-theater	2023-06-08 01:48:14+00	2023-06-08 01:48:14+00
0c7a09b1-b232-41f2-aca6-da88bc122cff	algonquins	2023-06-08 13:49:40+00	2023-06-08 13:49:40+00
58347588-7557-4c33-b879-4381ec107ee9	larmes-de-angel	2023-06-08 15:23:29+00	2023-06-08 15:23:29+00
6ea63e4b-12e1-4218-9759-a3a99c31ef32	kaneko	2023-06-08 19:54:13+00	2023-06-08 19:54:13+00
3cade109-a31e-463c-9e67-c9695d78132e	carina-e-arlequin	2023-06-09 02:41:22+00	2023-06-09 02:41:22+00
c4fa69cf-002a-48a9-8ee9-bf1869fe4e34	checkerboard	2023-07-10 00:25:06+00	2023-07-10 00:25:06+00
10bc2543-3f54-4f6a-a6ae-929ef7a570f4	cruel-arcadia	2023-07-24 18:28:39+00	2023-07-24 18:28:39+00
0ab74d6e-93da-43f4-a61a-2caf29f993a4	yoh	2023-07-28 18:58:37+00	2023-07-28 18:58:37+00
87234031-8018-4d09-818a-3de6ee375db2	ghosts	2023-11-18 00:39:58+00	2023-11-18 00:39:58+00
cd8b3cab-6130-41c5-aab4-4f99f9ee6051	childrens	2024-01-03 03:49:05+00	2024-01-03 03:49:05+00
26dc810d-97a6-431e-bdd1-bdb3a7c5b412	hoshibako-works	2024-02-14 01:47:15+00	2024-02-14 01:47:15+00
4316697a-c64d-4c3b-8585-37891871d2f5	fluffy-tori	2024-02-14 02:18:49+00	2024-02-14 02:18:49+00
1b536a4d-b987-47ef-8610-78df5691bffe	waxpoeticshop	2024-02-14 02:40:10+00	2024-02-14 02:40:10+00
fd612943-4e36-4a04-9bbf-8fe7d2f9ba03	CuteQ	2024-02-14 02:57:44+00	2024-02-14 02:57:44+00
6e026bac-84e1-4f19-9bcc-c4efb3f3750c	SummerTales	2024-02-23 00:22:10+00	2024-02-23 00:22:10+00
c218caa0-5851-48e9-9118-8977487f8288	lesprit-de-la-noblesse	2024-03-13 04:19:59+00	2024-03-13 04:19:59+00
81e1a53c-4fab-4854-8290-f3e8c4b2c33b	marchentica	2024-03-14 00:36:01+00	2024-03-14 00:36:01+00
352b51a1-651a-43e2-bd28-35ad1fed1f68	marchenromantica	2024-03-14 00:38:18+00	2024-03-14 00:38:18+00
c55ea9c4-af59-471b-89fc-fc6fa9b472e3	beholderfashions	2024-09-03 21:05:03+00	2024-09-03 21:05:03+00
31cc021b-dd68-4263-a19a-b9ffc992d7d5	milianda	2024-09-03 21:06:38+00	2024-09-03 21:06:38+00
4126da1a-cb4b-43f5-8e03-5b6abb832fe0	purewing	2024-09-03 21:14:01+00	2024-09-03 21:14:01+00
785f5fd2-925d-43db-9a36-2f11e91aae0f	kuma	2024-09-03 21:19:07+00	2024-09-03 21:19:07+00
b6c0c4a2-1a04-4a80-8201-57a719648ef9	dusk-prophecy	2024-12-01 05:38:06+00	2024-12-01 05:38:06+00
c345cfbe-e4e2-4572-b27f-260849a3fce3	zazou-planet	2024-12-02 20:11:01+00	2024-12-02 20:11:01+00
3fef6b7f-4fe8-4b0f-ac77-8f5173c21c18	ccf	2025-01-05 05:32:35+00	2025-01-05 05:32:35+00
fbf7d2a8-eedb-4cac-9b2a-0b1255b5f184	lettre-de-m	2025-01-05 05:36:50+00	2025-01-05 05:36:50+00
ca6a1a86-54c1-4bdd-90de-e26ce14e3c93	bugs	2025-02-25 14:49:53+00	2025-02-25 14:49:53+00
ec4e2563-6ffd-40c6-98d6-ee5556738b07	miss-danger	2025-05-28 03:10:42+00	2025-05-28 03:10:42+00
45c6c91b-208b-4177-b95b-856ee3c20113	little-rose-planet	2025-05-28 03:13:46+00	2025-05-28 03:13:46+00
1e7663c4-11f8-4a1e-9170-d545a9577ab2	mossbadger	2025-07-21 04:54:34+00	2025-07-21 04:54:34+00
bf7128fa-49a8-4f48-9edc-b7f46f7ef729	angel-fish	2026-06-10 02:06:54+00	2026-06-10 02:06:54+00
662a3f2f-9bbe-4714-a4e7-c4a434fd582f	le-carrousel	2026-06-10 02:08:24+00	2026-06-10 02:08:24+00
7c81a0d2-29ad-4846-9348-818ca2561526	plushii-kawaii	2026-06-10 02:10:17+00	2026-06-10 02:10:17+00
cafee464-b8bb-4ad5-baa4-1b72ae50a678	whimsy-kei	2026-06-10 02:23:33+00	2026-06-10 02:23:33+00
b80f4c2c-acab-48b0-b7bf-ff90b418f4a8	sugarstar-cafe	2026-06-10 02:31:24+00	2026-06-10 02:31:24+00
c12fa34d-10b4-4bc5-b830-ab6f8fb14c27	dn	2026-06-10 03:01:45+00	2026-06-10 03:01:45+00
\.


--
-- Data for Name: tag_translations; Type: TABLE DATA; Schema: public; Owner: laravel
--

COPY public.tag_translations (id, tag_id, locale, name, created_at, updated_at) FROM stdin;
1	5287901a-111a-49a0-b3dd-a32052a8eef3	en	Roses	\N	\N
2	3af89989-28c4-4e70-a08c-d4d8de2826c7	en	Gardens	\N	\N
3	e1448e60-ce4d-4291-83e7-65c8b154e7e3	en	Architectural	\N	\N
4	f500e424-9b4e-4a43-bb9e-3f84f76df7f9	en	Chairs	\N	\N
5	8371d116-6102-4855-95c0-75ccd2bafc85	en	Swans	\N	\N
6	c115f273-3ddd-432b-b036-9d3c3823c3a4	en	Perfumes	\N	\N
7	df261473-2a70-4ed5-8dd7-91452051eff4	en	Bottles	\N	\N
10	70c0964e-2f5c-4b79-9dea-b36fde2ceea1	en	Writing	\N	\N
11	a9126e03-66ea-4b48-9b4e-187526246502	en	Sweets	\N	\N
12	98189ad6-9575-4c0f-a0d8-386e7b91fa8a	en	Stars	\N	\N
13	1ff3901d-1ece-4e79-b35c-067450b7bb74	en	Hearts	\N	\N
14	cd1f0d47-08f4-4a32-9273-1ef117aaecf4	en	Desserts	\N	\N
15	bdf7a0ab-8d53-491d-a7cf-5760da8e7546	en	Cakes	\N	\N
16	3ec8747a-fee5-4ec8-811a-5f5c8f406c61	en	Food	\N	\N
17	ce42a0bd-7fe6-4042-9142-33179cca6a3e	en	Crowns	\N	\N
18	79a5d8b7-83ec-452e-b86b-de09b28af4ba	en	Castles	\N	\N
19	148491eb-4c1d-4c84-9220-25d7c6a2a6c3	en	Swan Lake	\N	\N
20	200b47c8-3fb0-4cf4-8bda-f9ceeab03300	en	Fairy Tales	\N	\N
21	b5834ea3-ae9c-4c73-ad86-5cde023c37ad	en	Florals	\N	\N
22	fa468a33-4710-42d5-aabb-bb2b56a0bd35	en	Alice in Wonderland	\N	\N
23	247fe0c3-96a4-45cf-ab9b-b72e74a786d0	en	Trumps	\N	\N
24	409ac7eb-9b4a-455f-a21d-e659d22229d8	en	Clocks	\N	\N
26	9bca6dec-3592-480f-b1c2-7e9ef90d2dd3	en	Strawberries	\N	\N
27	ee207d84-d31c-41fd-8f2a-d969aa561124	en	Crosses	\N	\N
28	62a1429a-38e1-4cda-b1fd-714c453a6eac	en	Frames	\N	\N
30	9b15d05a-acab-49e8-9eb6-1388c47bb6bf	en	Incomplete-colorways	\N	\N
31	bc777600-18a9-4ec1-b935-fcdc843d71b5	en	Butterflies	\N	\N
32	a02b26f4-7e97-4416-b6e2-4aa0f1975fb7	en	Thorns	\N	\N
33	e1cd8467-2bdc-42fb-81a9-5ce9508f7eca	en	Windows	\N	\N
34	0c742330-c88e-41da-ad2f-4a8c260f57dd	en	Gates	\N	\N
35	10cb852f-faec-489d-8fae-50023abca73a	en	Chandeliers	\N	\N
36	833619de-fabc-409b-bf3d-fd986cccb52e	en	Candles	\N	\N
37	2b00ee01-6459-41c6-ab59-6aec76a485ca	en	Ornaments	\N	\N
38	94b2de49-b081-4dc9-acc3-f10ef8b6bf42	en	Christmas	\N	\N
39	b9a11a81-6e75-4664-bad8-74d7d7350dd9	en	Abstract Decorative	\N	\N
40	75f5b041-0f50-4f36-ba88-75e53255b8fa	en	Fruits	\N	\N
41	6e8844be-b360-49bf-81ed-1284f82ae109	en	Cherries	\N	\N
42	ab99b523-5a8b-464a-ac88-040f21c4ae62	en	Snow White	\N	\N
43	582aaf5e-0656-4059-967f-0b6c73752a59	en	Apples	\N	\N
44	9dbf01d4-ebab-4ba2-916b-37cd9b13ad43	en	Animals	\N	\N
45	164f79f5-d2ec-4f5a-aed1-a0be99a85795	en	Forest	\N	\N
46	c2f00d40-f2cf-4ae7-81f2-4f1b2c7eab97	en	Trees	\N	\N
48	ec3d8362-6dfc-4c21-a161-6f3d5fda75fc	en	White Rabbit	\N	\N
49	d3a21074-e48d-4443-acd5-e11cfbafdf96	en	Cats	\N	\N
50	bf2736c4-0056-4517-82d8-cc05d2c2e4a8	en	Bunnybears	\N	\N
51	034a7d78-2c42-441a-8eb9-b9eb2a66919e	en	Furniture	\N	\N
52	6bddda82-3da0-4671-952c-da5d8b6dcbe2	en	Daisies	\N	\N
53	72e592f8-bcc0-4b6f-a36e-c71e97f26c5b	en	Bouquets	\N	\N
54	c8dfbb9e-aac2-4a7d-94d4-23553d600819	en	Birds	\N	\N
55	b0aa776c-eda7-482f-8d48-2da2db150e3d	en	Birdcages	\N	\N
56	cc925d7c-707f-4d34-8a2f-dcca88622ea9	en	Cookies	\N	\N
57	29b84e71-56f0-4d95-8edd-948e545847e4	en	Playing Cards	\N	\N
58	b4b7051e-a22e-4012-9c20-1252515004c9	en	Marine	\N	\N
59	6492f5b1-e815-43c0-a3d7-d1897bb84cd3	en	Grass	\N	\N
60	31fc1b44-0788-48f6-9edc-f1826f7bbce0	en	Clouds	\N	\N
61	10e8bc10-e26a-478a-b7f9-263fb286ce3a	en	Whipped Cream	\N	\N
62	4f05986b-e3ef-4ee2-ad27-b255883e4b64	en	Ice Creams	\N	\N
63	9e86b439-c4f5-495a-8b7f-954af61d13db	en	Bears	\N	\N
64	3010ad34-21c5-4df0-a4a5-cb6e1eee7a07	en	Candy	\N	\N
65	13f05c97-ddce-4a9c-bd48-fa1877f2b852	en	Beds	\N	\N
66	54f6e0dd-bc60-4e25-bacc-4a1bbd3b87d1	en	Treasures	\N	\N
67	5c634064-b597-4c1b-8b18-ccbf67aee6f5	en	Pirates	\N	\N
68	cae850b4-811f-4c21-9d87-222c3d7fb80f	en	Musical Notes	\N	\N
70	e26cea64-2b6f-4a67-bb06-08177a6db0a9	en	Keys (non-piano)	\N	\N
72	8026e2b8-825f-4cf5-b061-7e9095c2c6fb	en	Fabric: Jacquard	\N	\N
73	e967aea5-ecc9-4661-ba28-c53ced6eb086	en	Fabric: Velveteen	\N	\N
74	963f404f-02ac-4ca7-9a67-d3c354e1aec4	en	Pattern: Regimental Stripes	\N	\N
75	2c1ab46d-4ab3-41c8-b5d5-afdc4749f622	en	Pattern: Pinstripes	\N	\N
76	60667b47-f661-4db0-ab56-74becad8d567	en	Pattern: Stripes	\N	\N
77	d5fb88f6-8ee0-4719-9682-911f1aa1e9c2	en	Detail: Pom-Poms	\N	\N
78	13c39cd7-9b84-49c6-b17f-ef8c2f9a9247	en	Pattern: Solid (OP,JSK & SKs Only)	\N	\N
79	959a0135-9d1a-4ed8-aa0f-8326dd261690	en	Designer: Imai Kira	\N	\N
80	a244589a-1a2d-4977-86b3-c163600d05d7	en	Coaches / Carriages	\N	\N
81	4778ff65-9521-4f3c-9c79-17f896cf5e4d	en	Fabric: Lace	\N	\N
82	4d56a435-3e90-4bfc-aeed-ec9bbf7ca9e4	en	Churches/Cathedrals	\N	\N
83	d275af53-605d-4f78-8c23-cc9b88a44fea	en	Detail: Embroidery	\N	\N
84	f3d80995-3dd3-460d-ad39-1a042c7e82d5	en	Style: Sailor	\N	\N
86	c738f3a4-ac46-4b9e-b4f9-89501fdd269f	en	Detail: Rickrack	\N	\N
87	94d96cf4-bd36-4614-b091-2f7de813aaed	en	Detail: Glitter	\N	\N
88	6aab9ef6-e7e1-4457-b819-3f0a6fc5a165	en	Animal Ears	\N	\N
89	42ea103a-ec7e-4fc9-8e94-cca96fc652df	en	Style: Maid	\N	\N
90	14f4fd24-cf61-454e-95ea-61d9a8d76432	en	Collaboration	\N	\N
91	04fd0dcd-e706-4b83-aab5-eb5500deba4a	en	Detail: Applique	\N	\N
92	85f32a89-7fea-4d07-b60b-dcf53f045578	en	Letters/Mail	\N	\N
94	ea72fb7f-f55f-410a-a659-580d731b59af	en	Detail: Bows	\N	\N
95	1ffe0b29-33e8-4ae8-8bef-0f9f1170b381	en	Pattern: Plaids,Tartan	\N	\N
96	ab69d91c-67f6-469f-967e-4ce21f5ae939	en	Pocket Watches	\N	\N
97	b3d0457b-ba5b-495a-8f26-afae76e9c7e8	en	Anchors	\N	\N
98	5ceb8a7f-7d98-4197-ad07-1a4edaee6e7a	en	Heraldry	\N	\N
99	d4f0390a-595c-4870-aa7a-feee080d4a85	en	Diamonds	\N	\N
100	d806236c-3854-46bc-a474-7ac99aeb8a61	en	Instruments	\N	\N
101	84c1d5c8-7ba8-4f64-8aa1-c2cb95649471	en	Staircases	\N	\N
103	fbc9d213-e837-4c45-9ebc-1d9cc334a398	en	Stained Glass	\N	\N
104	774c4752-36d5-4bda-a358-de2bdfcd552c	en	Circus	\N	\N
105	758fd1d9-4248-4446-9448-1096ba8757c9	en	Balloons	\N	\N
106	2535508b-c990-4666-a7b3-da6f85829566	en	Fleur-de-lis	\N	\N
107	a65f1189-e16c-43b7-8d10-fa1ddcda6be2	en	Wings	\N	\N
108	d88902b0-9164-4595-a15f-ffdce28f8c0f	en	Moons	\N	\N
109	a2fbc8ea-5831-4fe1-921a-c15230a87683	en	Theatre	\N	\N
110	190a6975-e382-4ad1-b20a-92c3d60c8007	en	Poodles	\N	\N
111	2af2b193-c7b4-4781-bdf7-d1ef9f5ee194	en	Carousels	\N	\N
112	5b36abc1-61d0-4153-b7f3-8f91936897c1	en	Replica	\N	\N
113	09997f04-4899-4074-9f9d-031466302f89	en	Mushrooms	\N	\N
114	5e4dcb60-545e-4191-bd57-24a685552618	en	Pianos	\N	\N
115	9175810c-90fe-4acb-8b85-42d064b8e4f5	en	Music	\N	\N
117	761f2b8a-af3e-4634-82fe-58d7d9bdaf21	en	Spiderwebs	\N	\N
118	b26835ea-c268-47b4-801b-0171ef111da2	en	Chains	\N	\N
119	b7a6c010-6e2b-4478-aad6-60a13c7174b5	en	Bats	\N	\N
120	2a678ffe-0422-4f30-ba53-0dde1fbc7528	en	Spiders	\N	\N
121	f4292a67-e8e6-4c5a-83d8-5ad559761713	en	Tea	\N	\N
122	38990061-0827-45a9-89d3-ef949c89ae50	en	Cups	\N	\N
123	ae6d2068-4e7b-40c1-a10f-2a73b1289613	en	Violins	\N	\N
124	254fd547-57bd-4624-948a-e8a97f92422d	en	Squirrels	\N	\N
125	7e541d9c-ae73-4351-bc0b-d194dc9f5d62	en	Sheep	\N	\N
126	dc8f3636-63e9-4c2b-b9f0-99b58b4f9331	en	Lions	\N	\N
25	9d6dd0a2-4895-441b-a15f-6d46f79948dd	en	Bunnies/Rabbits	\N	2024-03-21 04:24:11+00
71	93042fe7-b712-4174-b2a7-ff345e0e4aa6	en	Skulls/Bones	\N	2026-01-03 23:42:12+00
47	d86a7b2f-2457-4018-a5ac-fecad9d1a209	en	Motif: Mirrors	\N	2026-01-21 17:36:12+00
29	30d5df5e-2306-445b-ada3-50000431ba72	en	People/Figures	\N	2026-01-22 23:40:20+00
93	adf4de04-f73d-4e59-884b-54b0661a7f01	en	Detail: Rhinestones/Jewels	\N	2026-02-07 02:45:55+00
8	f8cdc971-1c61-4ac8-a185-2742420a71ff	en	Detail: Pearls	\N	2026-03-30 16:40:40+00
127	7b072ca1-3556-49c7-b118-cc62bdbfc8cc	en	Plants	\N	\N
128	216ab08e-d139-410d-9f14-cc6b7027e06b	en	Dolls	\N	\N
129	8cb3486a-3c32-4cd5-b48a-ebc1f047d40a	en	Sleeping Beauty	\N	\N
131	9430230c-f046-435a-bf03-732773251928	en	Cameos	\N	\N
132	cc84e20d-75cd-4b81-87ee-c08d9b5c3ff8	en	Clubs	\N	\N
133	93444f7a-f41e-43e6-9c31-e04e75a9369c	en	Spades	\N	\N
134	904872ab-3d8c-404c-aa97-d0019945b6fe	en	Numbers	\N	\N
135	078d36ba-7645-4a50-8cbb-47555c4c0300	en	Toys	\N	\N
136	8b6265e5-a2f8-4099-a7d3-2365d89ee879	en	Halloween	\N	\N
137	a30b090a-3f7e-48c6-ab45-378cfa6e27bc	en	Elephants	\N	\N
138	34793d93-33ca-400b-b057-ff45ac786694	en	Ballerinas	\N	\N
139	fb3bf2f7-f2b0-4281-9659-752ee8e35495	en	Ships	\N	\N
140	8f593035-b0cc-482f-b600-b51027bf558e	en	Seashells	\N	\N
141	84238c3f-1388-4c4c-b3cb-f5dc47b9ad04	en	Nursery Rhymes	\N	\N
142	2de9e121-5651-478c-8a39-4a4edc049ebe	en	Books	\N	\N
143	ce947ad8-aaf1-42e0-8b24-7bc82274798f	en	Chess	\N	\N
144	5cfcf9e5-a425-4541-9587-ab532506f644	en	Macarons	\N	\N
145	85bfca68-43ba-4b66-89e7-8ef77e524dd7	en	Pies	\N	\N
146	70072323-c877-4251-8ac3-f2d3609d133f	en	Mermaids	\N	\N
147	d155164c-d71c-4370-abdb-b0ed0e988427	en	Jams	\N	\N
148	6a9d0dcb-d98d-4787-9dfa-f1ddf95e86c5	en	Chocolates	\N	\N
149	7172edc2-bdfe-4008-af88-4e495bff82bb	en	Eiffel Tower	\N	\N
150	ceab0b21-0aef-4908-bfe6-8dba6a63999a	en	Cutlery	\N	\N
151	71ee2101-150b-4f58-a2db-365029f22331	en	Spoons	\N	\N
152	f32b774a-d0c1-475e-8c9c-17a2e5f3fdae	en	Unicorns	\N	\N
154	04dd7ad4-d36d-4926-8915-1c52704d1c2d	en	Japanese Indie	\N	\N
155	ac29b233-3faa-4925-97d3-14d3ee739ffb	en	Bubbles	\N	\N
156	d337f75a-4ca2-4312-b1fd-484179feaf8c	en	Doughnuts	\N	\N
157	984ef551-6a4d-4602-8c44-5e4ffd17b329	en	Royalty	\N	\N
158	8c213370-4984-43ed-9f75-d389f39f57e5	en	Cinderella	\N	\N
159	a0085398-5d31-4d00-ab04-7f5b27e75808	en	Lipsticks	\N	\N
160	2c0e20ff-09cb-4542-a5ab-5a1798e7c32b	en	Snowflakes	\N	\N
161	724b2379-3daa-4cd2-a7ac-2f2290861d78	en	Fabric: Organdy/Organza	\N	\N
162	d12916ca-4ba4-4b37-9e6a-5e4f9527fb5d	en	Pattern: Argyle	\N	\N
163	b471d546-4626-42f4-9e99-351fcf54595a	en	Pattern: Camo	\N	\N
164	4df05feb-9688-4c7b-9974-0d40ac2bfc15	en	Pattern: Houndstooth	\N	\N
165	3674697a-ae1e-4188-81b4-8dc699894a35	en	Material: Acrylic Resin	\N	\N
166	0fe23d8f-74bf-46d6-b8d8-26c3a4c24834	en	Fabric: Denim	\N	\N
167	a136fdf2-702e-427e-b5cb-5096a5a26cad	en	Designer: Novala Takemoto	\N	\N
168	54d0c06d-faeb-4b24-b0ee-74d04d7d0a5b	en	Witches / Magic	\N	\N
169	fe69cd09-d2c4-4182-a241-cac26f2335e8	en	Gifts/Presents	\N	\N
170	e4437025-c44f-40d1-abca-31e7d8aa6261	en	Item: Choker	\N	\N
171	e3c2268f-6977-4aaf-9106-1685bcf4cc16	en	Item: Hairclip	\N	\N
172	a85026f7-a04f-40fd-a578-95bd475e539f	en	Cupcakes/Muffins	\N	\N
173	90298b53-5960-4b91-9571-7ff0545a5ba4	en	Item: Canotier	\N	\N
174	77a18fde-ee4c-4ebd-a84d-9cab54f69526	en	Motif: Hats	\N	\N
175	8b30ccf3-b11d-4067-a877-cc9b1b6ab482	en	Style: Military	\N	\N
176	558f4b51-2094-47f0-a558-4415fbc79264	en	Item: Wrist Cuffs	\N	\N
177	655a77a7-0d31-4fcb-808a-ec1bc3391175	en	Dogs/Puppies	\N	\N
178	27b9a3b1-46c7-4439-bf86-21f6e7f18f0e	en	Item: Apron	\N	\N
179	aa666862-3dc3-48bc-929c-666ee9889285	en	Sub-Line: Crown Label	\N	\N
181	17d38bc2-6f4f-47f3-98e6-4cf3e767579f	en	Astronomy/Space	\N	\N
183	45db235f-2761-4755-9cd8-ea632b1f79ce	en	Lacy	\N	\N
184	f3d6dae7-fa1f-4652-ac96-e41604e9819a	en	Horses/Ponies	\N	\N
185	97726e25-dd5e-4dff-a852-4f599497db61	en	Violets/Pansies	\N	\N
186	8e43623d-26fe-4dc2-ba13-ff0200b0fb98	en	Fabric: Gobelin	\N	\N
187	209fa323-d81f-4a14-862d-b181e2df9411	en	Item: Bonnet	\N	\N
188	b561e47d-a6d7-463c-b723-735b59444001	en	Motif: Cosmetics	\N	\N
189	b25a08b2-8abb-4d3c-837c-6f651735b0aa	en	Motif: Clothing and Shoes	\N	\N
190	258fe6f0-9224-4cb9-91f4-8187fc69f0f3	en	Fans	\N	\N
191	fcbd1189-918a-41d2-9e96-761b4bd4de0f	en	Buildings	\N	\N
192	48c1912d-7660-4c32-8033-85e690d86417	en	Fairies	\N	\N
193	589e877b-bcbc-410a-a303-54af1ff0f629	en	Masks	\N	\N
194	f61c7697-6ab4-437d-b3e8-f6c0b6bf43f5	en	Tarot	\N	\N
195	84f19366-1076-4cbb-ae26-b30dd6f893e6	en	Gloomy Bear	\N	\N
196	9d8d799a-6e93-424b-a0ba-4cd0a8cfb776	en	Coffins	\N	\N
197	0184ac6f-3d84-4b7f-bd84-af44b07bf376	en	Kuragehime	\N	\N
198	3ab7fa9e-0219-4418-84dd-28898c3cda44	en	Religious Motifs	\N	\N
199	edd99c4e-caa2-46ae-85b5-86f1879be3a5	en	Plates	\N	\N
200	5b55d2ef-d295-41b2-bcd8-cba97003a7c1	en	Western Indie	\N	\N
201	67f0bb4f-d4ea-454c-bc65-0e77e7d68308	en	Raspberries	\N	\N
202	4e536381-e94a-4250-bf61-478c8ef0e0c8	en	Dolphins	\N	\N
203	84faadf0-73a0-4fda-9312-8d8d9a44ff13	en	Disney	\N	\N
204	959a70e3-06fd-4acc-9a65-1ff931c03a32	en	Paintings	\N	\N
205	5d13dd7f-5301-4338-855a-8e090d79a943	en	Arts	\N	\N
206	0f393374-49bc-47f1-83aa-496b86f6d242	en	Print Replica	\N	\N
207	903c3cf3-536a-4442-b3b9-7f54c3fbde33	en	Forks	\N	\N
208	545feed3-b37d-4865-8879-c3dc0c630b39	en	Foxes	\N	\N
210	a6a4f9ca-0567-4110-a9e0-ed8089e061a9	en	Laurels	\N	\N
211	0db4ef1f-effb-4d29-b917-574a470e51b3	en	Korean Indie	\N	\N
212	d841132c-c3ea-4a8e-95a3-f718a21752c4	en	Doors	\N	\N
213	f2f15f12-e333-41a4-954c-af6c2e75ae14	en	Hands	\N	\N
214	54de7f53-958c-488c-9f03-2b0f3049069b	en	Eyes	\N	\N
215	8d0cb50e-2a4b-4636-afac-a9bc1002fc90	en	Creamy Mami	\N	\N
216	afca0316-fdad-48de-a207-a77dd8464ad0	en	Mice	\N	\N
217	aafdb820-cbef-4f2e-a23c-b263c2b07c8e	en	Chinese Indie	\N	\N
218	510c43cb-2618-4d37-abed-1fe660631f17	en	Snow Globes	\N	\N
219	6a1a4ace-d5e0-45c6-8e7a-cbe766abe71c	en	Peter Pan	\N	\N
220	dc0a8b4b-083a-468a-b01d-7196e43a1139	en	Phantom of the Opera	\N	\N
221	2fe741d5-7743-407b-bb44-64240ef5fd96	en	Puppets	\N	\N
222	ba308f5d-3492-40a9-a622-40a141402c6b	en	Weddings	\N	\N
223	1635480b-17d9-49a6-9cfd-2c1a39226829	en	Pegasus	\N	\N
224	713a3325-daa6-4193-adb2-0e2d54271ee8	en	Little Red Riding Hood	\N	\N
225	a1e8f6d6-8256-4272-a43f-6007f7fbd604	en	Fabric: Leather	\N	\N
226	5e4e4472-c68d-4681-b023-cb14c217c9f2	en	Pattern: Toile	\N	\N
227	189fcdc1-067e-4c8f-9a2c-e83e35236849	en	Sub-Line: Shotgun Wedding	\N	\N
228	f019c054-1904-49d7-ae4e-332bd2946ccc	en	Indie Brand: Fanplusfriend	\N	\N
229	f6aa50fc-c64e-46ce-8abf-b9ab47251a89	en	Indie Brand: Magic Potion	\N	\N
230	dceb49ec-f180-412c-9669-57b686fe7759	en	Indie Brand: Cherie Cerise	\N	\N
231	3c6e9b58-d567-4d96-a289-44fce7e0adf6	en	Item: Ring	\N	\N
232	be8b93cd-f53a-44ae-8e58-76c9198ef34a	en	Indie Brand: Magic Tea Party	\N	\N
233	b0896a36-cf23-497a-881a-9911b37e37be	en	Indie Brand: Lusty'n Wonderland	\N	\N
234	a54ffece-5faa-46c9-a1af-9a62db5fb735	en	Indie Brand: The Snow Field	\N	\N
235	9cbb71a1-a868-4fbe-a7e1-24feaa2b9512	en	Indie Brand: Boguta	\N	\N
236	95b48c4b-d6d2-4208-9247-8e61adf39a85	en	Indie Brand: Pumpkin Cat	\N	\N
238	8a439fa9-423c-4216-ba72-13b401db3e44	en	Indie Brand: KidsYoyo	\N	\N
240	7d32c077-4354-45c4-bce1-b98a7dbf892f	en	Indie Brand: R Series	\N	\N
241	7b3dd3ff-198c-4e06-a9fc-483eb8a7f650	en	Indie Brand: Lethe's Castle	\N	\N
243	71f32f96-2573-4ca5-bed5-9f89f67d6810	en	Indie Brand: We're All Mad Here	\N	\N
244	62e4ee22-e10a-470a-bb79-2294c85dcebe	en	Indie Brand: Marchenmerry	\N	\N
245	5ffe3a83-30e8-44aa-b161-539625659856	en	Indie Brand: Mystery Garden	\N	\N
246	2b129174-161e-4919-a986-8b21485da293	en	Sub-Line: Dark Box	\N	\N
130	f025198a-76b9-43d6-9fce-1b0607e490b4	en	Motif: Feathers	\N	2026-01-21 17:41:25+00
180	1b14b999-2f4a-4d3d-9bfa-a536ca339bfa	en	Detail: Beads	\N	2026-03-30 16:41:07+00
247	9a4d8906-98fa-4a8e-91be-f011d7134b71	en	Item: Scrunchie / Hair Tie	\N	\N
248	1e21c4ee-a745-4609-ae4d-f716871c3abb	en	Indie Brand: Spica	\N	\N
249	fbb1a252-e442-4e8e-b188-9fa767423d72	en	Sub-Line: PtMY (Putumayo)	\N	\N
250	07988043-c876-4295-9110-264244c0bc48	en	Indie Brand: Elpress L	\N	\N
251	05ce0cf3-8358-4465-b408-c9e0daab384f	en	Indie Brand: Fairy Wish	\N	\N
252	05610265-fcde-4efd-89ed-7a413d634420	en	Indie Brand: Mew	\N	\N
253	46934c25-bdae-4472-b1ab-c6d170d9487a	en	Indie Brand: GRAMM	\N	\N
254	d5869c48-5d65-43ea-8c73-179745cb6172	en	Item: Necklace	\N	\N
255	f4fd2742-16a4-4fef-827d-ec57fd313c3c	en	Item: Gloves	\N	\N
257	ac069808-12bd-4339-bd18-0a944d73da9d	en	Item: Bracelet	\N	\N
258	abf6935b-8032-4e52-9e50-e1189c629512	en	Item: Earrings	\N	\N
259	a9c2cbbf-f0a9-4f18-a5e8-021c6af29866	en	Item: Gilet	\N	\N
260	86cfb6fc-767e-41ac-9fdb-ce81fc98f104	en	Indie Brand: HMHM	\N	\N
261	0576b53a-c59f-4682-9b2f-1415b043265b	en	Item: Brooch	\N	\N
262	7e4be614-7dff-4582-be52-90baacdc54a6	en	Recalled Item	\N	\N
263	759fb641-c6ab-4dee-80c1-0557b9676d4b	en	Item: Arm Warmers	\N	\N
264	72b53869-f3da-4f88-8126-056df30e1057	en	Tassels	\N	\N
265	6d991b39-5b78-42f9-9490-3188b2e3d26e	en	Motif: Shoes	\N	\N
266	137c117d-f0b5-4057-8507-322a4105f86e	en	Sub-Line: Lapin Agill	\N	\N
267	f62d5937-8b6d-4f5e-9fb8-e0f90703d598	en	Indie Brand: Strawberry on the Shortcake	\N	\N
268	6e6620da-bc81-416c-bae1-955a3974979d	en	Indie Brand: White Moon	\N	\N
269	18e282f2-dc5a-4222-a03d-4320d7863b93	en	Indie Brand: Cloud Chamber	\N	\N
270	657bdb91-7157-4242-81eb-928f7a2d333b	en	Indie Brand: Baroque	\N	\N
271	cfa01ebf-44a9-44fc-a914-4f555e17ecd5	en	Sub-Line: MAM	\N	\N
272	2187df4b-282c-4186-aa2a-3f8011f27ffc	en	Motif: Sunglasses	\N	\N
273	e10da7a8-277a-4d9e-80a7-7cab5020c027	en	Motif: Purses	\N	\N
274	81d371a5-ed25-47db-9d4b-ecb285ae5872	en	Harps	\N	\N
275	4931a57b-e5df-4463-8d9c-f393f696e173	en	Gears	\N	\N
276	da1fc3d9-fe79-4e37-b74e-280d20b427bf	en	The Nutcracker	\N	\N
277	42a02dcc-7aba-4db3-96f8-f63dcb3fb25f	en	The Little Mermaid	\N	\N
278	5352a8a1-ae65-425e-a1df-d72b8e53a043	en	Beauty and the Beast	\N	\N
279	69768313-fab6-40ae-a862-66bd8a1d0b5c	en	Rapunzel	\N	\N
280	c4c439f6-bdbf-43dd-9efe-ebf535332fa7	en	Lollipops	\N	\N
281	2edf7bbb-39f9-4f90-aee4-4b1476a93d23	en	Doves	\N	\N
282	21c2f99b-c3a4-4524-9f6c-590444596104	en	Fabric: Chiffon	\N	\N
283	c807ad8e-86e3-4352-8c46-63303a2c2983	en	Fabric: Faux Fur	\N	\N
284	20d3f0f3-a98c-45d7-a2c8-adb29ae4df83	en	Fabric: Synthetic Leather	\N	\N
285	61f8be95-829a-44ab-a146-58d750e77d47	en	Fabric: Crêpe de Chine	\N	\N
286	fa15a4ef-9b01-42d7-b4c4-81c143de8c5f	en	Fabric: Satin	\N	\N
287	81bd4871-5340-4eb0-9467-c2b03d265288	en	Fabric: Broadcloth	\N	\N
288	e7e024ca-72b0-46c2-afe0-796c2d300069	en	Fabric: Butcher	\N	\N
289	f33fea20-4c70-40cd-9af9-91819f2134f4	en	Fabric: Twill	\N	\N
290	9e2ede1e-6847-4bd4-b2b8-2e0fef3acdc8	en	Pattern: Animal Print	\N	\N
291	1ad9ec2a-58c3-483e-aca7-66de7886b2a0	en	Pillows	\N	\N
292	a4be4a43-fc8e-4ceb-ad54-d18e819a1f4d	en	Lamps (Not Chandeliers)	\N	\N
293	7a2f96ca-d48e-4b6c-bc29-15a42d1154a1	en	Partial (Incomplete Information)	\N	\N
294	09c8a2c1-36ac-4050-b4f8-9de25dde2114	en	Pattern: Polka Dots	\N	\N
295	dea6fcc5-dfc9-4e93-8016-b1a33ed178cb	en	Fabric: Burberry	\N	\N
296	87ee31de-bf06-4802-881b-6d41dde2a0b7	en	Curtains/Drapes	\N	\N
297	7f292148-671b-47b2-a0b4-bfdff33283af	en	Flags	\N	\N
298	61aff707-1ec0-402d-a382-04db8d1e7408	en	Fabric: Wool	\N	\N
299	ff5b6c81-5d78-4306-a554-799fa02744f7	en	Reindeer/Deer/Bambi	\N	\N
300	13985661-d18e-469e-a476-e6b1b4b69299	en	Bathrooms	\N	\N
301	f824cf09-ccc4-4d13-8f56-ec51c32572f1	en	Indie Brand: Marchen die Prinzessin	\N	\N
302	d36d042c-8884-4c22-afe1-6dcbc1095d4a	en	Indie Brand: Schwarz Schmetterling	\N	\N
303	c7299dbe-21cd-4d22-81eb-c86c7d33d43e	en	Indie Brand: Chocomint	\N	\N
304	9aad6f2c-a07e-492f-99a0-84151f2f2f53	en	Indie Brand: Little Chili Shop	\N	\N
305	858c1323-7299-4414-8efa-b2bd782d3f4f	en	Indie Brand: Pina Sweetcollection	\N	\N
306	7c0a6ccf-56ae-4fcc-b299-c9073d4620b6	en	Indie Brand: Rose Trianon	\N	\N
307	795ec298-b337-4479-8209-1ecfb49bc7a2	en	Indie Brand: Automatic Honey	\N	\N
308	2ff33588-c576-4919-b765-8b8022e92f89	en	Indie Brand: SWIMMER	\N	\N
309	0eec7034-789e-4bba-9199-41457c13dd65	en	Indie Brand: Dear Margaret	\N	\N
310	d2f05649-7adc-40b4-a20e-3dd71f99e1ee	en	East Asian	\N	\N
311	056db6ae-9eda-403e-8630-0bc09aa58943	en	Pattern: Damask	\N	\N
312	3c8f47ea-c67b-45e0-b61b-48a75b78f35d	en	Indie Brand: Violet Fane	\N	\N
313	de414a89-16df-4cb6-aca2-fc795415d8bc	en	Fabric: Shantung	\N	\N
314	9d679cea-1dc6-43ab-84db-4308ab88bf69	en	Pattern: Lace Print	\N	\N
316	cfe1fb80-23b2-4238-8125-3b9bbb6de577	en	Item: Shoe-Clips	\N	\N
317	9a50e334-7852-4e30-9aea-5fe677cf205b	en	Detail: Flocking	\N	\N
318	1e615461-f8e5-4627-ac8b-c27afe84ea54	en	Material: Plastic	\N	\N
319	14f4cf79-1d20-49fb-8d78-937f458dac31	en	Item: Lucky Pack	\N	\N
320	d3ec78f2-7115-4b5b-9bf4-d0e88d1816b8	en	Indie Brand: abilletage	\N	\N
322	adb47b96-96d6-4d16-bafa-49efac3108cd	en	Indie Brand: Morun x Muuna Stoik	\N	\N
324	6af0c4fc-f05a-46ad-823c-8a0f37081084	en	Fabric: Tulle	\N	\N
325	25a748ac-5490-4638-bdbd-31f9f94d4f17	en	Easter	\N	\N
326	810314ff-b250-4e7b-8c38-4b745a526967	en	Lemons	\N	\N
327	13be8970-32e7-4435-b91f-698abc6b2e1c	en	Pattern: Gradient	\N	\N
328	3d25977c-fe58-4e23-95f1-1f0912e5f20e	en	Horoscope/Astrology	\N	\N
330	204a527a-1b29-4344-8307-188d50b206b4	en	Indie Brand: Kazuko Ogawa	\N	\N
331	ccbebff1-c82e-47e9-ba1e-7fd7a7649866	en	Wolves	\N	\N
333	c58a7438-185a-4164-b604-22333329b6a9	en	Motif: Ribbons/Bows	\N	\N
334	2a01e5a5-36ae-40c6-84fa-7ab4b417269c	en	Indie Brand: Ange	\N	\N
335	0db54482-a318-47f6-ae2b-84d37c5e0dc3	en	Pattern: Gingham	\N	\N
337	bd461446-f28a-45b4-baa8-79f54639a7a8	en	Sole: Wood	\N	\N
338	25b480f5-48b9-445b-93de-cc2d26e32dbe	en	Sole: Rubber	\N	\N
339	01e8acfb-93aa-4836-82c7-09a817c0e526	en	Sole: Foam	\N	\N
340	b9e47d6a-a543-4d2c-9f2a-92e35d483c1f	en	Fabric: Canvas	\N	\N
341	023e3f85-40ca-4ab0-965f-de2749c8ca29	en	Finish: Matte	\N	\N
342	111d14e4-8aaa-4509-82f4-fd9f3a2f00fc	en	Finish: Glossy/Patent	\N	\N
343	11fa9af8-353d-4c30-8b1b-43b477e93d2a	en	Finish: Suede	\N	\N
344	40f72ec4-3f0d-42c0-8a4c-040956229cbb	en	Sole: Cork	\N	\N
345	3750a78a-5976-49ca-b205-f6bbac64975c	en	Indie Brand: Uf	\N	\N
346	01394c41-3bae-4df6-899e-9e9930fe02fd	en	Indie Brand: Seraphim	\N	\N
347	8f8eccac-d7bb-4032-b73c-e851fe381030	en	Sensitive Content	\N	\N
348	37ff5c0e-f635-4e86-9072-8df0176526ec	en	Indie Brand:Pretty/Pretty Scandal	\N	\N
349	fa292233-6a0c-4378-a83b-a67c732f8a85	en	Material: Straw/Wicker	\N	\N
350	52331933-6c7a-4623-8ee3-28ab7145231f	en	Russian Indie	\N	\N
351	e013d9b6-7b13-40f4-8e99-fa6a74f6a5d2	en	Indie Brand: Elegy	\N	\N
353	d2e25328-0a2c-414f-93a3-2ffa9ac1875e	en	Item: Hat	\N	\N
354	aeb340c7-31ea-4f9c-8932-7c5cf67daae0	en	Indie Brand: A+Lidel	\N	\N
355	3d584723-b691-4fa5-9689-ece285f61468	en	Indie Brand: Diamond Honey	\N	\N
356	7130552e-4b7d-4fb7-b2a6-981a74ac172b	en	Item: Headband	\N	\N
357	1dcd303c-ab56-41c0-a668-5daa73a86460	en	Item: Veil	\N	\N
332	f965ffb7-74d5-4fd8-ac5b-7180404248c1	en	Indie Brand: Classic Lolita	\N	2025-05-12 19:09:32+00
256	c804f702-8b58-42d0-a7a9-89e8f8780e2b	en	Style: Nurse	\N	2026-01-03 23:37:25+00
358	0b9279b6-863c-4d23-a7a1-b8ef4a041e14	en	Indie Brand: Sweet Mildred	\N	\N
359	2ffb943a-efa7-4120-8996-d75818ee3924	en	Indie Brand: Fantastic Wind	\N	\N
360	c5f94629-0062-4ffb-84db-a88cb5009494	en	Indie Brand: Vierge Vampur	\N	\N
361	fee03109-8754-4a33-879d-2cd7d8b2f9e6	en	Indie Brand: Miss Point	\N	\N
362	89da885e-4487-4e7c-8f0c-e16ea45aebce	en	Indie Brand: Arcadian Deer	\N	\N
363	08fb8d3e-ee0a-4312-9923-4dbe9c6dd7cf	en	Indie Brand: R. R. Memorandum	\N	\N
364	98814024-ac97-47a9-8b19-9feb14cd05ee	en	Indie Brand: Long Ears Sharp Ears	\N	\N
365	7012ef73-54a3-495f-9751-7801766b4841	en	Indie Brand: Dolly House	\N	\N
366	3dd565c3-73d4-442a-a633-ddc7b7660984	en	Indie Brand: Me Likes Tea	\N	\N
367	3711838d-d5d0-42ce-a615-31487c6efa27	en	Indie Brand: Lumiebre	\N	\N
368	2016812a-3bcd-45df-a8c1-b1a1d7660bb5	en	Indie Brand: To Alice	\N	\N
369	5e0b0018-79a9-4adc-9b1c-e5691ec25bda	en	Indie Brand: Sing a Lullaby for You	\N	\N
370	c1b52295-d1ed-4293-9980-05caf47d6749	en	Indie Brand: Eat Me Ink Me	\N	\N
371	ad686d33-8cda-4b38-b381-7a922aa35a30	en	Indie Brand: TourNewSoul	\N	\N
372	68b435c9-1c3f-41e2-9114-4b2c91a87b9f	en	Indie Brand: Dandy Puppeteer	\N	\N
373	7a04cf8a-3901-40a7-ad0d-182bf348cfbe	en	Indie Brand: Strawberry Witch	\N	\N
375	acc3d253-4b8e-4003-9f6d-fed28e884c6d	en	Sub-Line: Axes Femme Kawaii	\N	\N
376	0cb1a194-e0dc-43a9-a73f-d60d44ddea81	en	Sub-Line: Axes Femme Poetique	\N	\N
377	94fb064a-25cc-4169-b768-a3aa8456382d	en	Sub-Line: Axes Femme Nostalgie	\N	\N
378	4f340ddf-e627-4d7f-807e-7a19fbdad7b3	en	Sub-Line: Axes Femme Kids	\N	\N
380	9eccd854-74a2-42e3-bd3f-f721b1436e81	en	Fabric: Corduroy	\N	\N
381	934310c3-51e6-4a34-b6af-ad8543e76421	en	Sub-Line: Aguglieria	\N	\N
382	f6565864-d9d4-427d-92ad-eeeb628e272d	en	Blood	\N	\N
383	b134365f-6cd6-4ea4-8a34-8bd67ac6c31d	en	Fabric: Fur	\N	\N
384	380171a6-7296-4678-ad44-ab8cc589c6fc	en	Sub-Line: MA	\N	\N
385	301d7f4c-081d-4154-b068-161bf0e59973	en	Sub-Line: na-th	\N	\N
386	275193d3-b21e-4562-a8be-3ef2af28975a	en	Sub-Line: Vallee Lys	\N	\N
387	a80fab5d-74c9-4731-89b5-1e7450b64324	en	Indie Brand: Visible	\N	\N
388	568a7b2e-30ac-4fd6-8746-f5b6a586c026	en	Indie Brand: Classical Puppets	\N	\N
389	5e623ac8-9764-4a79-ac35-5b6408af96f8	en	Indie Brand: Little Dipper	\N	\N
390	3caa67e0-6937-4d53-9417-b7e4c56edca0	en	Indie Brand: Coquette Doll	\N	\N
391	1e88d3eb-7a32-422d-9116-522cff35fdbc	en	Item: Comb	\N	\N
392	f27862e1-7cfd-452d-9df9-2082990a74dd	en	Sanrio	\N	\N
393	6c8c228f-24f0-4cb5-a6b3-3f7aec1915eb	en	Sub-Line: Mille Noirs	\N	\N
394	548c1595-aa23-40b4-b7db-5663a1cdb58f	en	Indie Brand: Moonrise Theater	\N	\N
395	0c7a09b1-b232-41f2-aca6-da88bc122cff	en	Indie Brand: Algonquins	\N	\N
396	58347588-7557-4c33-b879-4381ec107ee9	en	Indie Brand: Larmes de Angel	\N	\N
397	6ea63e4b-12e1-4218-9759-a3a99c31ef32	en	Indie Brand: Kaneko	\N	\N
398	3cade109-a31e-463c-9e67-c9695d78132e	en	Indie Brand: Carina e Arlequin	\N	\N
399	c4fa69cf-002a-48a9-8ee9-bf1869fe4e34	en	Pattern: Checkerboard	\N	\N
400	10bc2543-3f54-4f6a-a6ae-929ef7a570f4	en	Indie Brand: Cruel Arcadia	\N	\N
401	0ab74d6e-93da-43f4-a61a-2caf29f993a4	en	Designer: Yoh	\N	\N
803	9aad6f2c-a07e-492f-99a0-84151f2f2f53	fr	Marque Indépendante : Little Chili Shop	\N	\N
804	18e282f2-dc5a-4222-a03d-4320d7863b93	fr	Marque Indépendante : Cloud Chamber	\N	\N
805	189fcdc1-067e-4c8f-9a2c-e83e35236849	fr	Sous-marque : Shotgun Wedding	\N	\N
806	934310c3-51e6-4a34-b6af-ad8543e76421	fr	Sous-marque : Aguglieria	\N	\N
807	6e6620da-bc81-416c-bae1-955a3974979d	fr	Marque Indépendante : White Moon	\N	\N
808	7b3dd3ff-198c-4e06-a9fc-483eb8a7f650	fr	Marque Indépendante : Lethe's Castle	\N	\N
809	2ff33588-c576-4919-b765-8b8022e92f89	fr	Marque Indépendante : SWIMMER	\N	\N
810	f62d5937-8b6d-4f5e-9fb8-e0f90703d598	fr	Marque Indépendante : Strawberry on the Shortcake	\N	\N
811	7e4be614-7dff-4582-be52-90baacdc54a6	fr	Articles Rappelés	\N	\N
812	5ffe3a83-30e8-44aa-b161-539625659856	fr	Marque Indépendante : Mystery Garden	\N	\N
813	6a1a4ace-d5e0-45c6-8e7a-cbe766abe71c	fr	Peter Pan	\N	\N
814	13985661-d18e-469e-a476-e6b1b4b69299	fr	Salles de bain	\N	\N
815	7c0a6ccf-56ae-4fcc-b299-c9073d4620b6	fr	Marque Indépendante : Rose Trianon	\N	\N
816	adb47b96-96d6-4d16-bafa-49efac3108cd	fr	Marque Indépendante : Morun x Muuna Stoik	\N	\N
817	71f32f96-2573-4ca5-bed5-9f89f67d6810	fr	Marque Indépendante : We're All Mad Here	\N	\N
818	2edf7bbb-39f9-4f90-aee4-4b1476a93d23	fr	Colombes	\N	\N
819	380171a6-7296-4678-ad44-ab8cc589c6fc	fr	Sous-marque : MA	\N	\N
820	84f19366-1076-4cbb-ae26-b30dd6f893e6	fr	Gloomy Bear	\N	\N
821	9cbb71a1-a868-4fbe-a7e1-24feaa2b9512	fr	Marque Indépendante : Boguta	\N	\N
822	0184ac6f-3d84-4b7f-bd84-af44b07bf376	fr	Kuragehime	\N	\N
823	2187df4b-282c-4186-aa2a-3f8011f27ffc	fr	Lunettes de soleil	\N	\N
825	a54ffece-5faa-46c9-a1af-9a62db5fb735	fr	Marque Indépendante : The Snow Field	\N	\N
826	1e21c4ee-a745-4609-ae4d-f716871c3abb	fr	Marque Indépendante : Spica	\N	\N
828	2fe741d5-7743-407b-bb44-64240ef5fd96	fr	Marionnettes	\N	\N
829	05610265-fcde-4efd-89ed-7a413d634420	fr	Marque Indépendante : Mew	\N	\N
830	dceb49ec-f180-412c-9669-57b686fe7759	fr	Marque Indépendant : Cherie Cerise	\N	\N
831	dc0a8b4b-083a-468a-b01d-7196e43a1139	fr	Le Fantôme de l'Opéra	\N	\N
832	3750a78a-5976-49ca-b205-f6bbac64975c	fr	Marque Indépendante : Uf	\N	\N
833	37ff5c0e-f635-4e86-9072-8df0176526ec	fr	Marque Indépendante : Pretty/Pretty Scandal	\N	\N
834	f2f15f12-e333-41a4-954c-af6c2e75ae14	fr	Mains	\N	\N
835	40f72ec4-3f0d-42c0-8a4c-040956229cbb	fr	Semelle : Liège	\N	\N
836	e10da7a8-277a-4d9e-80a7-7cab5020c027	fr	Imprimé Sacs à main	\N	\N
837	01e8acfb-93aa-4836-82c7-09a817c0e526	fr	Semelle : Mousse	\N	\N
838	f6565864-d9d4-427d-92ad-eeeb628e272d	fr	Sang	\N	\N
839	cfe1fb80-23b2-4238-8125-3b9bbb6de577	fr	Objet : Pinces à Chaussures	\N	\N
840	2a01e5a5-36ae-40c6-84fa-7ab4b417269c	fr	Marque Indépendante : Ange	\N	\N
841	46934c25-bdae-4472-b1ab-c6d170d9487a	fr	Marque Indépendante : GRAMM	\N	\N
842	2b129174-161e-4919-a986-8b21485da293	fr	Sous-marque : Dark Box	\N	\N
843	84238c3f-1388-4c4c-b3cb-f5dc47b9ad04	fr	Comptines	\N	\N
844	8d0cb50e-2a4b-4636-afac-a9bc1002fc90	fr	Creamy Mami	\N	\N
845	5352a8a1-ae65-425e-a1df-d72b8e53a043	fr	La Belle et la Bête	\N	\N
846	da1fc3d9-fe79-4e37-b74e-280d20b427bf	fr	Casse-Noisette	\N	\N
847	62e4ee22-e10a-470a-bb79-2294c85dcebe	fr	Marque Indépendante : Marchenmerry	\N	\N
848	275193d3-b21e-4562-a8be-3ef2af28975a	fr	Sous-marque : Vallee Lys	\N	\N
849	aeb340c7-31ea-4f9c-8932-7c5cf67daae0	fr	Marque Indépendante : A+Lidel	\N	\N
850	d3ec78f2-7115-4b5b-9bf4-d0e88d1816b8	fr	Marque Indépendante : abilletage	\N	\N
851	a9c2cbbf-f0a9-4f18-a5e8-021c6af29866	fr	Article : Gilet	\N	\N
852	f6aa50fc-c64e-46ce-8abf-b9ab47251a89	fr	Marque Indépendante : Magic Potion	\N	\N
853	0eec7034-789e-4bba-9199-41457c13dd65	fr	Marque Indépendante : Dear Margaret	\N	\N
854	a0085398-5d31-4d00-ab04-7f5b27e75808	fr	Rouges à lèvres	\N	\N
855	86cfb6fc-767e-41ac-9fdb-ce81fc98f104	fr	Marque Indépendante : HMHM	\N	\N
856	204a527a-1b29-4344-8307-188d50b206b4	fr	Marque Indépendante : Kazuko Ogawa	\N	\N
857	07988043-c876-4295-9110-264244c0bc48	fr	Marque Indépendante : Elpress L	\N	\N
858	42a02dcc-7aba-4db3-96f8-f63dcb3fb25f	fr	La Petite Sirène	\N	\N
859	fbb1a252-e442-4e8e-b188-9fa767423d72	fr	Sous-marque : PtMY (Putumayo)	\N	\N
824	f965ffb7-74d5-4fd8-ac5b-7180404248c1	fr	Marque Indépendante : Classic Lolita	\N	2025-05-12 19:09:32+00
860	b471d546-4626-42f4-9e99-351fcf54595a	fr	Motif : Camouflage	\N	\N
861	ba308f5d-3492-40a9-a622-40a141402c6b	fr	Mariages	\N	\N
862	b0896a36-cf23-497a-881a-9911b37e37be	fr	Marque Indépendante : Lusty'n Wonderland	\N	\N
863	8a439fa9-423c-4216-ba72-13b401db3e44	fr	Marque Indépendante : KidsYoyo	\N	\N
864	4e536381-e94a-4250-bf61-478c8ef0e0c8	fr	Dauphins	\N	\N
865	6492f5b1-e815-43c0-a3d7-d1897bb84cd3	fr	Herbe	\N	\N
866	a30b090a-3f7e-48c6-ab45-378cfa6e27bc	fr	Éléphants	\N	\N
867	5e4e4472-c68d-4681-b023-cb14c217c9f2	fr	Motif : Toile	\N	\N
868	0cb1a194-e0dc-43a9-a73f-d60d44ddea81	fr	Sous-marque : Axes Femme Poetique	\N	\N
869	54de7f53-958c-488c-9f03-2b0f3049069b	fr	Yeux	\N	\N
870	d841132c-c3ea-4a8e-95a3-f718a21752c4	fr	Portes	\N	\N
871	858c1323-7299-4414-8efa-b2bd782d3f4f	fr	Marque Indépendante : Pina Sweetcollection	\N	\N
872	1ad9ec2a-58c3-483e-aca7-66de7886b2a0	fr	Oreillers	\N	\N
873	510c43cb-2618-4d37-abed-1fe660631f17	fr	Boules à neiges	\N	\N
874	11fa9af8-353d-4c30-8b1b-43b477e93d2a	fr	Finitions : Daim	\N	\N
875	69768313-fab6-40ae-a862-66bd8a1d0b5c	fr	Raiponce	\N	\N
876	8f8eccac-d7bb-4032-b73c-e851fe381030	fr	Contenu Sensible	\N	\N
877	8cb3486a-3c32-4cd5-b48a-ebc1f047d40a	fr	Belle au bois dormant	\N	\N
878	81d371a5-ed25-47db-9d4b-ecb285ae5872	fr	Harpes	\N	\N
879	13f05c97-ddce-4a9c-bd48-fa1877f2b852	fr	Lits	\N	\N
880	b9e47d6a-a543-4d2c-9f2a-92e35d483c1f	fr	Tissu : Toile	\N	\N
881	01394c41-3bae-4df6-899e-9e9930fe02fd	fr	Marque indépendante : Seraphim	\N	\N
882	5e623ac8-9764-4a79-ac35-5b6408af96f8	fr	Marque indépendante : Little Dipper	\N	\N
883	d36d042c-8884-4c22-afe1-6dcbc1095d4a	fr	Marque Indépendante : Schwarz Schmetterling	\N	\N
884	68b435c9-1c3f-41e2-9114-4b2c91a87b9f	fr	Marque Indépendante : Dandy Puppeteer	\N	\N
885	25a748ac-5490-4638-bdbd-31f9f94d4f17	fr	Pâques	\N	\N
886	a80fab5d-74c9-4731-89b5-1e7450b64324	fr	Marque Indépendante : Visible	\N	\N
888	a6a4f9ca-0567-4110-a9e0-ed8089e061a9	fr	Lauriers	\N	\N
889	0f393374-49bc-47f1-83aa-496b86f6d242	fr	Réplique de l'Impression	\N	\N
890	98814024-ac97-47a9-8b19-9feb14cd05ee	fr	Marque Indépendante : Long Ears Sharp Ears	\N	\N
892	7012ef73-54a3-495f-9751-7801766b4841	fr	Marque Indépendante : Dolly House	\N	\N
893	a2fbc8ea-5831-4fe1-921a-c15230a87683	fr	Théâtre	\N	\N
894	1635480b-17d9-49a6-9cfd-2c1a39226829	fr	Pégase	\N	\N
895	c5f94629-0062-4ffb-84db-a88cb5009494	fr	Marque Indépendante : Vierge Vampur	\N	\N
896	67f0bb4f-d4ea-454c-bc65-0e77e7d68308	fr	Framboises	\N	\N
897	fee03109-8754-4a33-879d-2cd7d8b2f9e6	fr	Marque Indépendante : Miss Point	\N	\N
898	95b48c4b-d6d2-4208-9247-8e61adf39a85	fr	Marque Indépendante : Pumpkin Cat	\N	\N
899	759fb641-c6ab-4dee-80c1-0557b9676d4b	fr	Article : Mitaines ou Manchettes	\N	\N
900	3dd565c3-73d4-442a-a633-ddc7b7660984	fr	Marque Indépendante : Me Likes Tea	\N	\N
901	2ffb943a-efa7-4120-8996-d75818ee3924	fr	Marque Indépendante : Fantastic Wind	\N	\N
902	657bdb91-7157-4242-81eb-928f7a2d333b	fr	Marque Indépendante : Baroque	\N	\N
903	89da885e-4487-4e7c-8f0c-e16ea45aebce	fr	Marque Indépendante : Arcadian Deer	\N	\N
904	84c1d5c8-7ba8-4f64-8aa1-c2cb95649471	fr	Escaliers	\N	\N
905	7a04cf8a-3901-40a7-ad0d-182bf348cfbe	fr	Marque Indépendante : Strawberry Witch	\N	\N
906	2016812a-3bcd-45df-a8c1-b1a1d7660bb5	fr	Marque Indépendante : To Alice	\N	\N
907	3d25977c-fe58-4e23-95f1-1f0912e5f20e	fr	Horoscope/Astrologie	\N	\N
908	f61c7697-6ab4-437d-b3e8-f6c0b6bf43f5	fr	Tarot	\N	\N
909	0b9279b6-863c-4d23-a7a1-b8ef4a041e14	fr	Marque Indépendante : Sweet Mildred	\N	\N
910	a136fdf2-702e-427e-b5cb-5096a5a26cad	fr	Designer: Novala Takemoto	\N	\N
911	c1b52295-d1ed-4293-9980-05caf47d6749	fr	Marque Indépendante : Eat Me Ink Me	\N	\N
912	a4be4a43-fc8e-4ceb-ad54-d18e819a1f4d	fr	Lampes	\N	\N
913	148491eb-4c1d-4c84-9220-25d7c6a2a6c3	fr	Lac des cygnes	\N	\N
914	2a678ffe-0422-4f30-ba53-0dde1fbc7528	fr	Araignées	\N	\N
915	8c213370-4984-43ed-9f75-d389f39f57e5	fr	Cendrillon	\N	\N
916	87ee31de-bf06-4802-881b-6d41dde2a0b7	fr	Rideaux/Drapés	\N	\N
917	ad686d33-8cda-4b38-b381-7a922aa35a30	fr	Marque Indépendante : TourNewSoul	\N	\N
918	13be8970-32e7-4435-b91f-698abc6b2e1c	fr	Motif : Dégradé	\N	\N
919	c4c439f6-bdbf-43dd-9efe-ebf535332fa7	fr	Sucettes	\N	\N
920	08fb8d3e-ee0a-4312-9923-4dbe9c6dd7cf	fr	Marque indépendante : R. R. Memorandum	\N	\N
921	bd461446-f28a-45b4-baa8-79f54639a7a8	fr	Semelle : Bois	\N	\N
922	85bfca68-43ba-4b66-89e7-8ef77e524dd7	fr	Tartes	\N	\N
924	9eccd854-74a2-42e3-bd3f-f721b1436e81	fr	Tissu : Velours côtélé	\N	\N
925	edd99c4e-caa2-46ae-85b5-86f1879be3a5	fr	Assiettes	\N	\N
926	afca0316-fdad-48de-a207-a77dd8464ad0	fr	Souris	\N	\N
927	b134365f-6cd6-4ea4-8a34-8bd67ac6c31d	fr	Tissu : Fourrure	\N	\N
928	c7299dbe-21cd-4d22-81eb-c86c7d33d43e	fr	Marque Indépendante : Chocomint	\N	\N
929	d155164c-d71c-4370-abdb-b0ed0e988427	fr	Confitures	\N	\N
930	795ec298-b337-4479-8209-1ecfb49bc7a2	fr	Marque Indépendante : Automatic Honey	\N	\N
931	904872ab-3d8c-404c-aa97-d0019945b6fe	fr	Nombres	\N	\N
932	70072323-c877-4251-8ac3-f2d3609d133f	fr	Sirènes	\N	\N
933	b561e47d-a6d7-463c-b723-735b59444001	fr	Cosmétiques	\N	\N
934	568a7b2e-30ac-4fd6-8746-f5b6a586c026	fr	Marque Indépendante : Classical Puppets	\N	\N
935	f824cf09-ccc4-4d13-8f56-ec51c32572f1	fr	Marque Indépendante : Marchen die Prinzessin	\N	\N
936	7d32c077-4354-45c4-bce1-b98a7dbf892f	fr	Marque Indépendante : R Series	\N	\N
937	05ce0cf3-8358-4465-b408-c9e0daab384f	fr	Marque Indépendante : Fairy Wish	\N	\N
938	545feed3-b37d-4865-8879-c3dc0c630b39	fr	Renards	\N	\N
939	ab99b523-5a8b-464a-ac88-040f21c4ae62	fr	Blanche Neige	\N	\N
940	7e541d9c-ae73-4351-bc0b-d194dc9f5d62	fr	Moutons	\N	\N
941	5d13dd7f-5301-4338-855a-8e090d79a943	fr	Arts	\N	\N
942	258fe6f0-9224-4cb9-91f4-8187fc69f0f3	fr	Éventails	\N	\N
943	959a0135-9d1a-4ed8-aa0f-8326dd261690	fr	Designer : Imai Kira	\N	\N
945	54f6e0dd-bc60-4e25-bacc-4a1bbd3b87d1	fr	Coffres à trésors	\N	\N
946	3c8f47ea-c67b-45e0-b61b-48a75b78f35d	fr	Marque Indépendante : Violet Fane	\N	\N
947	48c1912d-7660-4c32-8033-85e690d86417	fr	Fées	\N	\N
948	ccbebff1-c82e-47e9-ba1e-7fd7a7649866	fr	Loups	\N	\N
949	7172edc2-bdfe-4008-af88-4e495bff82bb	fr	Tour Eiffel	\N	\N
950	d12916ca-4ba4-4b37-9e6a-5e4f9527fb5d	fr	Motif : Argyle (losanges)	\N	\N
951	589e877b-bcbc-410a-a303-54af1ff0f629	fr	Masques	\N	\N
952	f27862e1-7cfd-452d-9df9-2082990a74dd	fr	Sanrio	\N	\N
953	b25a08b2-8abb-4d3c-837c-6f651735b0aa	fr	Imprimé de vêtements et de chaussures	\N	\N
954	7f292148-671b-47b2-a0b4-bfdff33283af	fr	Drapeaux	\N	\N
955	c804f702-8b58-42d0-a7a9-89e8f8780e2b	fr	Style : Infirmière	\N	\N
956	5e0b0018-79a9-4adc-9b1c-e5691ec25bda	fr	Marque Indépendante : Sing a Lullaby for You	\N	\N
957	3af89989-28c4-4e70-a08c-d4d8de2826c7	fr	Jardins	\N	\N
958	f019c054-1904-49d7-ae4e-332bd2946ccc	fr	Marque Indépendante : Fanplusfriend	\N	\N
959	5c634064-b597-4c1b-8b18-ccbf67aee6f5	fr	Pirates	\N	\N
960	4931a57b-e5df-4463-8d9c-f393f696e173	fr	Engrenages	\N	\N
961	3d584723-b691-4fa5-9689-ece285f61468	fr	Marque Indépendante : Diamond Honey	\N	\N
962	5b36abc1-61d0-4153-b7f3-8f91936897c1	fr	Réplique	\N	\N
963	be8b93cd-f53a-44ae-8e58-76c9198ef34a	fr	Marque Indépendante : Magic Tea Party	\N	\N
964	52331933-6c7a-4623-8ee3-28ab7145231f	fr	Marque Indépendante Russe	\N	\N
1083	29b84e71-56f0-4d95-8edd-948e545847e4	fr	Cartes a jouer	\N	\N
923	df668af3-5c82-4a25-8076-bd053d8798cd	fr	Motif : Parapluies	\N	2026-01-04 03:38:03+00
967	164f79f5-d2ec-4f5a-aed1-a0be99a85795	fr	Forêt	\N	\N
968	761f2b8a-af3e-4634-82fe-58d7d9bdaf21	fr	Toiles d'araignée	\N	\N
969	d337f75a-4ca2-4312-b1fd-484179feaf8c	fr	Beignets	\N	\N
971	713a3325-daa6-4193-adb2-0e2d54271ee8	fr	Le Petit Chaperon Rouge	\N	\N
972	84faadf0-73a0-4fda-9312-8d8d9a44ff13	fr	Disney	\N	\N
973	ce947ad8-aaf1-42e0-8b24-7bc82274798f	fr	Échecs	\N	\N
974	ab69d91c-67f6-469f-967e-4ce21f5ae939	fr	Montre a gousset	\N	\N
975	fb3bf2f7-f2b0-4281-9659-752ee8e35495	fr	Navires	\N	\N
976	5e4dcb60-545e-4191-bd57-24a685552618	fr	Pianos	\N	\N
978	e013d9b6-7b13-40f4-8e99-fa6a74f6a5d2	fr	Marque Indépendante : Elegy	\N	\N
979	4d56a435-3e90-4bfc-aeed-ec9bbf7ca9e4	fr	Églises / Cathédrales	\N	\N
980	d86a7b2f-2457-4018-a5ac-fecad9d1a209	fr	Miroirs	\N	\N
981	94b2de49-b081-4dc9-acc3-f10ef8b6bf42	fr	Noël	\N	\N
982	fbc9d213-e837-4c45-9ebc-1d9cc334a398	fr	Vitraux	\N	\N
983	6d991b39-5b78-42f9-9490-3188b2e3d26e	fr	Imprimé de chaussures	\N	\N
984	137c117d-f0b5-4057-8507-322a4105f86e	fr	Sous-marque : Lapin Agill	\N	\N
985	34793d93-33ca-400b-b057-ff45ac786694	fr	Ballerines	\N	\N
986	a02b26f4-7e97-4416-b6e2-4aa0f1975fb7	fr	Épines	\N	\N
988	e7e024ca-72b0-46c2-afe0-796c2d300069	fr	Tissu : Lin de boucher	\N	\N
991	3711838d-d5d0-42ce-a615-31487c6efa27	fr	Marque Indépendante : Lumiebre	\N	\N
992	97726e25-dd5e-4dff-a852-4f599497db61	fr	Violettes/Pensées	\N	\N
993	903c3cf3-536a-4442-b3b9-7f54c3fbde33	fr	Fourchettes	\N	\N
994	0fe23d8f-74bf-46d6-b8d8-26c3a4c24834	fr	Tissu : Denim	\N	\N
995	ac29b233-3faa-4925-97d3-14d3ee739ffb	fr	Bulles	\N	\N
996	45db235f-2761-4755-9cd8-ea632b1f79ce	fr	Dentelles	\N	\N
997	77a18fde-ee4c-4ebd-a84d-9cab54f69526	fr	Motif : Chapeaux	\N	\N
998	14f4cf79-1d20-49fb-8d78-937f458dac31	fr	Article : Lucky Pack	\N	\N
999	254fd547-57bd-4624-948a-e8a97f92422d	fr	Écureuils	\N	\N
1001	cc84e20d-75cd-4b81-87ee-c08d9b5c3ff8	fr	Enseignes de cartes	\N	\N
1002	2b00ee01-6459-41c6-ab59-6aec76a485ca	fr	Décorations de Noël	\N	\N
1003	42ea103a-ec7e-4fc9-8e94-cca96fc652df	fr	Style : Servante	\N	\N
1004	216ab08e-d139-410d-9f14-cc6b7027e06b	fr	Poupées	\N	\N
1005	09997f04-4899-4074-9f9d-031466302f89	fr	Champignons	\N	\N
1006	b0aa776c-eda7-482f-8d48-2da2db150e3d	fr	Cages a oiseaux	\N	\N
1007	0c742330-c88e-41da-ad2f-4a8c260f57dd	fr	Portail	\N	\N
1008	810314ff-b250-4e7b-8c38-4b745a526967	fr	Citrons	\N	\N
1009	9d8d799a-6e93-424b-a0ba-4cd0a8cfb776	fr	Cercueils	\N	\N
1010	111d14e4-8aaa-4509-82f4-fd9f3a2f00fc	fr	Fini : Brillant/Vernis	\N	\N
1011	ae6d2068-4e7b-40c1-a10f-2a73b1289613	fr	Violons	\N	\N
1012	4df05feb-9688-4c7b-9974-0d40ac2bfc15	fr	Motif : Pied de poule	\N	\N
1013	c115f273-3ddd-432b-b036-9d3c3823c3a4	fr	Parfums	\N	\N
1014	774c4752-36d5-4bda-a358-de2bdfcd552c	fr	Cirques	\N	\N
1015	f500e424-9b4e-4a43-bb9e-3f84f76df7f9	fr	Chaises	\N	\N
1016	10e8bc10-e26a-478a-b7f9-263fb286ce3a	fr	Crème fouettée	\N	\N
1017	f32b774a-d0c1-475e-8c9c-17a2e5f3fdae	fr	Licornes	\N	\N
1018	93444f7a-f41e-43e6-9c31-e04e75a9369c	fr	Piques	\N	\N
1019	8f593035-b0cc-482f-b600-b51027bf558e	fr	Coquillages	\N	\N
1020	056db6ae-9eda-403e-8630-0bc09aa58943	fr	Motif : Damas	\N	\N
1021	dc8f3636-63e9-4c2b-b9f0-99b58b4f9331	fr	Lions	\N	\N
1022	b3d0457b-ba5b-495a-8f26-afae76e9c7e8	fr	Ancres	\N	\N
1023	9e2ede1e-6847-4bd4-b2b8-2e0fef3acdc8	fr	Motif : Animal	\N	\N
1024	27b9a3b1-46c7-4439-bf86-21f6e7f18f0e	fr	Article : Tablier	\N	\N
1025	1dcd303c-ab56-41c0-a668-5daa73a86460	fr	Article : Voile	\N	\N
1026	90298b53-5960-4b91-9571-7ff0545a5ba4	fr	Article : Canotier	\N	\N
1027	a244589a-1a2d-4977-86b3-c163600d05d7	fr	Carrosses	\N	\N
1028	2c0e20ff-09cb-4542-a5ab-5a1798e7c32b	fr	Flocons de neige	\N	\N
1029	1e615461-f8e5-4627-ac8b-c27afe84ea54	fr	Matériau : Plastique	\N	\N
1030	034a7d78-2c42-441a-8eb9-b9eb2a66919e	fr	Meubles	\N	\N
1031	5cfcf9e5-a425-4541-9587-ab532506f644	fr	Macarons	\N	\N
1032	f4fd2742-16a4-4fef-827d-ec57fd313c3c	fr	Article : Gants	\N	\N
1033	cfa01ebf-44a9-44fc-a914-4f555e17ecd5	fr	Sous-marque : MAM	\N	\N
1035	a1e8f6d6-8256-4272-a43f-6007f7fbd604	fr	Matériau : Cuir	\N	\N
1036	71ee2101-150b-4f58-a2db-365029f22331	fr	Cuillères	\N	\N
1037	54d0c06d-faeb-4b24-b0ee-74d04d7d0a5b	fr	Sorcières/Magie	\N	\N
1038	fe69cd09-d2c4-4182-a241-cac26f2335e8	fr	Cadeaux	\N	\N
1039	aa666862-3dc3-48bc-929c-666ee9889285	fr	Sous-marque : Crown Label	\N	\N
1040	e1cd8467-2bdc-42fb-81a9-5ce9508f7eca	fr	Fenêtres	\N	\N
1041	acc3d253-4b8e-4003-9f6d-fed28e884c6d	fr	Sous-marque : Axes Femme Kawaii	\N	\N
1042	a85026f7-a04f-40fd-a578-95bd475e539f	fr	Cupcakes/Muffins	\N	\N
1043	fa292233-6a0c-4378-a83b-a67c732f8a85	fr	Matériel : Osier/Paille	\N	\N
1044	c738f3a4-ac46-4b9e-b4f9-89501fdd269f	fr	Détail : Rickrack	\N	\N
1046	c2f00d40-f2cf-4ae7-81f2-4f1b2c7eab97	fr	Arbres	\N	\N
1047	582aaf5e-0656-4059-967f-0b6c73752a59	fr	Pommes	\N	\N
1048	758fd1d9-4248-4446-9448-1096ba8757c9	fr	Ballons	\N	\N
1049	fcbd1189-918a-41d2-9e96-761b4bd4de0f	fr	Bâtiments	\N	\N
1050	2af2b193-c7b4-4781-bdf7-d1ef9f5ee194	fr	Carousels (manèges)	\N	\N
1051	9a4d8906-98fa-4a8e-91be-f011d7134b71	fr	Article : Chouchou / Élastique à cheveux	\N	\N
1052	df261473-2a70-4ed5-8dd7-91452051eff4	fr	Bouteilles	\N	\N
1053	190a6975-e382-4ad1-b20a-92c3d60c8007	fr	Caniches	\N	\N
1054	17d38bc2-6f4f-47f3-98e6-4cf3e767579f	fr	Astronomie/Espace	\N	\N
1055	b4b7051e-a22e-4012-9c20-1252515004c9	fr	Marin	\N	\N
1056	f33fea20-4c70-40cd-9af9-91819f2134f4	fr	Tissu : Sergé	\N	\N
1057	0db4ef1f-effb-4d29-b917-574a470e51b3	fr	Marque Indépendante Coréenne	\N	\N
1058	4f05986b-e3ef-4ee2-ad27-b255883e4b64	fr	Glaces	\N	\N
1059	ec3d8362-6dfc-4c21-a161-6f3d5fda75fc	fr	Le Lapin blanc	\N	\N
1060	ff5b6c81-5d78-4306-a554-799fa02744f7	fr	Renne/Cerf/Bambi	\N	\N
1061	959a70e3-06fd-4acc-9a65-1ff931c03a32	fr	Peintures	\N	\N
1062	655a77a7-0d31-4fcb-808a-ec1bc3391175	fr	Chiens/Chiots	\N	\N
1063	10cb852f-faec-489d-8fae-50023abca73a	fr	Lustres	\N	\N
1064	38990061-0827-45a9-89d3-ef949c89ae50	fr	Tasses	\N	\N
1065	61f8be95-829a-44ab-a146-58d750e77d47	fr	Tissu : Crêpe de Chine	\N	\N
1066	ac069808-12bd-4339-bd18-0a944d73da9d	fr	Article : Bracelet	\N	\N
1067	8e43623d-26fe-4dc2-ba13-ff0200b0fb98	fr	Tissu : Gobelin	\N	\N
1068	8b6265e5-a2f8-4099-a7d3-2365d89ee879	fr	Halloween	\N	\N
1069	85f32a89-7fea-4d07-b60b-dcf53f045578	fr	Lettres/Courriers	\N	\N
1070	d806236c-3854-46bc-a474-7ac99aeb8a61	fr	Instruments (de musique)	\N	\N
1071	9a50e334-7852-4e30-9aea-5fe677cf205b	fr	Détail : Flocage	\N	\N
1072	833619de-fabc-409b-bf3d-fd986cccb52e	fr	Bougies	\N	\N
1073	3ab7fa9e-0219-4418-84dd-28898c3cda44	fr	Motifs religieux	\N	\N
1074	abf6935b-8032-4e52-9e50-e1189c629512	fr	Article : Boucles d'oreilles	\N	\N
1075	6bddda82-3da0-4671-952c-da5d8b6dcbe2	fr	Marguerites	\N	\N
1076	bf2736c4-0056-4517-82d8-cc05d2c2e4a8	fr	Ours-lapins	\N	\N
1077	31fc1b44-0788-48f6-9edc-f1826f7bbce0	fr	Nuages	\N	\N
1078	25b480f5-48b9-445b-93de-cc2d26e32dbe	fr	Semelle : Gomme	\N	\N
1079	078d36ba-7645-4a50-8cbb-47555c4c0300	fr	Jouets	\N	\N
1080	984ef551-6a4d-4602-8c44-5e4ffd17b329	fr	Royauté	\N	\N
1081	b7a6c010-6e2b-4478-aad6-60a13c7174b5	fr	Chauve-souris	\N	\N
1082	cd1f0d47-08f4-4a32-9273-1ef117aaecf4	fr	Desserts	\N	\N
1084	93042fe7-b712-4174-b2a7-ff345e0e4aa6	fr	Crânes	\N	\N
1085	ceab0b21-0aef-4908-bfe6-8dba6a63999a	fr	Couverts	\N	\N
1086	9430230c-f046-435a-bf03-732773251928	fr	Camées	\N	\N
1087	9175810c-90fe-4acb-8b85-42d064b8e4f5	fr	Musique	\N	\N
1088	72b53869-f3da-4f88-8126-056df30e1057	fr	Pampille	\N	\N
1089	2de9e121-5651-478c-8a39-4a4edc049ebe	fr	Livres	\N	\N
1090	8b30ccf3-b11d-4067-a877-cc9b1b6ab482	fr	Style : Militaire	\N	\N
1091	de414a89-16df-4cb6-aca2-fc795415d8bc	fr	Tissu : Soie sauvage	\N	\N
1092	d5fb88f6-8ee0-4719-9682-911f1aa1e9c2	fr	Détail : Pompons	\N	\N
1093	200b47c8-3fb0-4cf4-8bda-f9ceeab03300	fr	Contes de fée	\N	\N
1094	7b072ca1-3556-49c7-b118-cc62bdbfc8cc	fr	Plantes	\N	\N
1095	023e3f85-40ca-4ab0-965f-de2749c8ca29	fr	Fini : Mat	\N	\N
1096	9d679cea-1dc6-43ab-84db-4308ab88bf69	fr	Motif : imprimé dentelle	\N	\N
1097	04fd0dcd-e706-4b83-aab5-eb5500deba4a	fr	Détail : Appliqué	\N	\N
1098	558f4b51-2094-47f0-a558-4415fbc79264	fr	Articles : Manchettes	\N	\N
1099	e1448e60-ce4d-4291-83e7-65c8b154e7e3	fr	Architecture	\N	\N
1100	79a5d8b7-83ec-452e-b86b-de09b28af4ba	fr	Châteaux	\N	\N
1101	d2f05649-7adc-40b4-a20e-3dd71f99e1ee	fr	Asie de l'est	\N	\N
1102	f4292a67-e8e6-4c5a-83d8-5ad559761713	fr	Thé	\N	\N
1103	1b14b999-2f4a-4d3d-9bfa-a536ca339bfa	fr	Perles	\N	\N
1104	3674697a-ae1e-4188-81b4-8dc699894a35	fr	Matériau : Résine acrylique	\N	\N
1106	a65f1189-e16c-43b7-8d10-fa1ddcda6be2	fr	Ailes	\N	\N
1107	cae850b4-811f-4c21-9d87-222c3d7fb80f	fr	Notes de musique	\N	\N
1108	409ac7eb-9b4a-455f-a21d-e659d22229d8	fr	Horloges	\N	\N
1109	72e592f8-bcc0-4b6f-a36e-c71e97f26c5b	fr	Bouquets	\N	\N
1110	8371d116-6102-4855-95c0-75ccd2bafc85	fr	Cygnes	\N	\N
1111	bdf7a0ab-8d53-491d-a7cf-5760da8e7546	fr	Gâteaux	\N	\N
1112	cc925d7c-707f-4d34-8a2f-dcca88622ea9	fr	Biscuits	\N	\N
1113	3ec8747a-fee5-4ec8-811a-5f5c8f406c61	fr	Nourriture	\N	\N
1115	2c1ab46d-4ab3-41c8-b5d5-afdc4749f622	fr	Motif : Rayures Verticales	\N	\N
1116	1e88d3eb-7a32-422d-9116-522cff35fdbc	fr	Article : Peigne	\N	\N
1117	e4437025-c44f-40d1-abca-31e7d8aa6261	fr	Article : Ras-de-cou	\N	\N
1118	f025198a-76b9-43d6-9fce-1b0607e490b4	fr	Plumes	\N	\N
1119	b26835ea-c268-47b4-801b-0171ef111da2	fr	Chaînes	\N	\N
1120	209fa323-d81f-4a14-862d-b181e2df9411	fr	Article : Bonnet	\N	\N
1121	61aff707-1ec0-402d-a382-04db8d1e7408	fr	Tissu : Laine	\N	\N
1122	e26cea64-2b6f-4a67-bb06-08177a6db0a9	fr	Clés (pas de piano)	\N	\N
1123	6a9d0dcb-d98d-4787-9dfa-f1ddf95e86c5	fr	Chocolats	\N	\N
1124	fa15a4ef-9b01-42d7-b4c4-81c143de8c5f	fr	Tissu : Satin	\N	\N
1125	2535508b-c990-4666-a7b3-da6f85829566	fr	Fleurs de lys	\N	\N
1126	724b2379-3daa-4cd2-a7ac-2f2290861d78	fr	Tissu : Organdi / Organza	\N	\N
1127	f3d6dae7-fa1f-4652-ac96-e41604e9819a	fr	Chevaux/Poneys	\N	\N
1128	04dd7ad4-d36d-4926-8915-1c52704d1c2d	fr	Marque Indépendante Japonaise	\N	\N
1129	0576b53a-c59f-4682-9b2f-1415b043265b	fr	Article : Broche	\N	\N
1130	3010ad34-21c5-4df0-a4a5-cb6e1eee7a07	fr	Bonbon	\N	\N
1131	6aab9ef6-e7e1-4457-b819-3f0a6fc5a165	fr	Oreilles d'animal	\N	\N
1132	963f404f-02ac-4ca7-9a67-d3c354e1aec4	fr	Motif : Rayures Régimentaires	\N	\N
1133	5ceb8a7f-7d98-4197-ad07-1a4edaee6e7a	fr	Blasons	\N	\N
1134	dea6fcc5-dfc9-4e93-8016-b1a33ed178cb	fr	Tissu : Burberry	\N	\N
1135	c8dfbb9e-aac2-4a7d-94d4-23553d600819	fr	Oiseaux	\N	\N
1136	bb2b6a63-aa52-4235-bd8f-21e332d0994e	fr	Détail : Tricoté	\N	\N
1137	d88902b0-9164-4595-a15f-ffdce28f8c0f	fr	Lunes	\N	\N
1138	bc777600-18a9-4ec1-b935-fcdc843d71b5	fr	Papillons	\N	\N
1139	fa468a33-4710-42d5-aabb-bb2b56a0bd35	fr	Alice au pays des Merveilles	\N	\N
1140	d4f0390a-595c-4870-aa7a-feee080d4a85	fr	Diamants	\N	\N
1141	6af0c4fc-f05a-46ad-823c-8a0f37081084	fr	Tissu : Tulle	\N	\N
1142	3c6e9b58-d567-4d96-a289-44fce7e0adf6	fr	Article : Bague	\N	\N
1143	8026e2b8-825f-4cf5-b061-7e9095c2c6fb	fr	Tissu : Jacquard	\N	\N
1144	f3d80995-3dd3-460d-ad39-1a042c7e82d5	fr	Style : Marin	\N	\N
1145	6e8844be-b360-49bf-81ed-1284f82ae109	fr	Cerises	\N	\N
1146	20d3f0f3-a98c-45d7-a2c8-adb29ae4df83	fr	Tissu : Cuir synthétique	\N	\N
1147	94d96cf4-bd36-4614-b091-2f7de813aaed	fr	Détail : Paillettes	\N	\N
1148	75f5b041-0f50-4f36-ba88-75e53255b8fa	fr	Fruits	\N	\N
1149	b9a11a81-6e75-4664-bad8-74d7d7350dd9	fr	Décorations abstraites	\N	\N
1150	a9126e03-66ea-4b48-9b4e-187526246502	fr	Sucreries	\N	\N
1151	81bd4871-5340-4eb0-9467-c2b03d265288	fr	Tissu : Drap fin	\N	\N
1152	62a1429a-38e1-4cda-b1fd-714c453a6eac	fr	Cadres	\N	\N
1153	aafdb820-cbef-4f2e-a23c-b263c2b07c8e	fr	Marque Indépendante Chinoise	\N	\N
1154	0db54482-a318-47f6-ae2b-84d37c5e0dc3	fr	Motif : Vichy	\N	\N
1155	14f4fd24-cf61-454e-95ea-61d9a8d76432	fr	Collaboration	\N	\N
1156	c807ad8e-86e3-4352-8c46-63303a2c2983	fr	Tissu : Fausse Fourrure	\N	\N
1158	5b55d2ef-d295-41b2-bcd8-cba97003a7c1	fr	Marque Indépendante Occidentale	\N	\N
1159	e3c2268f-6977-4aaf-9106-1685bcf4cc16	fr	Article : Pince à cheveux	\N	\N
1160	d2e25328-0a2c-414f-93a3-2ffa9ac1875e	fr	Article : Chapeau	\N	\N
1161	30d5df5e-2306-445b-ada3-50000431ba72	fr	Personnages	\N	\N
1162	d3a21074-e48d-4443-acd5-e11cfbafdf96	fr	Chats	\N	\N
1163	9bca6dec-3592-480f-b1c2-7e9ef90d2dd3	fr	Fraises	\N	\N
1164	9e86b439-c4f5-495a-8b7f-954af61d13db	fr	Ours	\N	\N
1165	d5869c48-5d65-43ea-8c73-179745cb6172	fr	Articles : Collier	\N	\N
1166	e967aea5-ecc9-4661-ba28-c53ced6eb086	fr	Tissu : Velours	\N	\N
1167	c58a7438-185a-4164-b604-22333329b6a9	fr	Motif : Rubans/Noeuds	\N	\N
1168	4778ff65-9521-4f3c-9c79-17f896cf5e4d	fr	Tissu : Dentelle	\N	\N
1169	ee207d84-d31c-41fd-8f2a-d969aa561124	fr	Croix	\N	\N
1170	9d6dd0a2-4895-441b-a15f-6d46f79948dd	fr	Lapins	\N	\N
1171	9dbf01d4-ebab-4ba2-916b-37cd9b13ad43	fr	Animaux	\N	\N
1172	98189ad6-9575-4c0f-a0d8-386e7b91fa8a	fr	Étoiles	\N	\N
1173	21c2f99b-c3a4-4524-9f6c-590444596104	fr	Tissu : Chiffon	\N	\N
1174	7130552e-4b7d-4fb7-b2a6-981a74ac172b	fr	Article : Serre-tête	\N	\N
1175	d275af53-605d-4f78-8c23-cc9b88a44fea	fr	Détail : Broderie	\N	\N
1176	09c8a2c1-36ac-4050-b4f8-9de25dde2114	fr	Motif : Pois	\N	\N
1177	f8cdc971-1c61-4ac8-a185-2742420a71ff	fr	Perles (nacrées)	\N	\N
1178	ce42a0bd-7fe6-4042-9142-33179cca6a3e	fr	Couronnes	\N	\N
1179	60667b47-f661-4db0-ab56-74becad8d567	fr	Motif : Rayures	\N	\N
1180	1ff3901d-1ece-4e79-b35c-067450b7bb74	fr	Cœurs	\N	\N
1181	ea72fb7f-f55f-410a-a659-580d731b59af	fr	Détail : Rubans	\N	\N
1182	9b15d05a-acab-49e8-9eb6-1388c47bb6bf	fr	Coloris-incomplets	\N	\N
1183	70c0964e-2f5c-4b79-9dea-b36fde2ceea1	fr	Écritures	\N	\N
1184	b5834ea3-ae9c-4c73-ad86-5cde023c37ad	fr	Fleurs	\N	\N
1185	7a2f96ca-d48e-4b6c-bc29-15a42d1154a1	fr	Partiel (Informations incomplètes)	\N	\N
1186	5287901a-111a-49a0-b3dd-a32052a8eef3	fr	Roses	\N	\N
1972	9aad6f2c-a07e-492f-99a0-84151f2f2f53	nl	Indie Brand: Little Chili Shop	\N	\N
1973	18e282f2-dc5a-4222-a03d-4320d7863b93	nl	Indie Brand: Cloud Chamber	\N	\N
1974	189fcdc1-067e-4c8f-9a2c-e83e35236849	nl	Submerk: Shotgun Wedding	\N	\N
1975	934310c3-51e6-4a34-b6af-ad8543e76421	nl	Submerk: Aguglieria	\N	\N
1976	6e6620da-bc81-416c-bae1-955a3974979d	nl	Indie Brand: White Moon	\N	\N
1977	7b3dd3ff-198c-4e06-a9fc-483eb8a7f650	nl	Indie Brand: Lethe's Castle	\N	\N
1978	2ff33588-c576-4919-b765-8b8022e92f89	nl	Indie Brand: SWIMMER	\N	\N
1979	f62d5937-8b6d-4f5e-9fb8-e0f90703d598	nl	Indie Brand: Strawberry on the Shortcake	\N	\N
1980	7e4be614-7dff-4582-be52-90baacdc54a6	nl	Teruggeroepen artikel	\N	\N
1981	5ffe3a83-30e8-44aa-b161-539625659856	nl	Indie Brand: Mystery Garden	\N	\N
1982	6a1a4ace-d5e0-45c6-8e7a-cbe766abe71c	nl	Peter Pan	\N	\N
1983	13985661-d18e-469e-a476-e6b1b4b69299	nl	Badkamers	\N	\N
1984	7c0a6ccf-56ae-4fcc-b299-c9073d4620b6	nl	Indie Brand: Rose Trianon	\N	\N
2096	b134365f-6cd6-4ea4-8a34-8bd67ac6c31d	nl	Stof: Bont	\N	\N
1157	adf4de04-f73d-4e59-884b-54b0661a7f01	fr	Détail : Strass/Joyaux	\N	2026-02-07 02:45:55+00
1985	adb47b96-96d6-4d16-bafa-49efac3108cd	nl	Indie Brand: Morun x Muuna Stoik	\N	\N
1986	71f32f96-2573-4ca5-bed5-9f89f67d6810	nl	Indie Brand: We're All Mad Here	\N	\N
1987	2edf7bbb-39f9-4f90-aee4-4b1476a93d23	nl	Duiven	\N	\N
1988	380171a6-7296-4678-ad44-ab8cc589c6fc	nl	Submerk: MA	\N	\N
1989	84f19366-1076-4cbb-ae26-b30dd6f893e6	nl	Gloomy Bear	\N	\N
1990	9cbb71a1-a868-4fbe-a7e1-24feaa2b9512	nl	Indie Brand: Boguta	\N	\N
1991	0184ac6f-3d84-4b7f-bd84-af44b07bf376	nl	Kuragehime/Princess Jellyfish	\N	\N
1992	2187df4b-282c-4186-aa2a-3f8011f27ffc	nl	Motief: Zonnebrillen	\N	\N
1994	a54ffece-5faa-46c9-a1af-9a62db5fb735	nl	Indie Brand: The Snow Field	\N	\N
1995	1e21c4ee-a745-4609-ae4d-f716871c3abb	nl	Indie Brand: Spica	\N	\N
1997	2fe741d5-7743-407b-bb44-64240ef5fd96	nl	Marionetten	\N	\N
1998	05610265-fcde-4efd-89ed-7a413d634420	nl	Indie Brand: Mew	\N	\N
1999	dceb49ec-f180-412c-9669-57b686fe7759	nl	Indie Brand: Cherie Cerise	\N	\N
2000	dc0a8b4b-083a-468a-b01d-7196e43a1139	nl	Phantom of the Opera	\N	\N
2001	3750a78a-5976-49ca-b205-f6bbac64975c	nl	Indie Brand: Uf	\N	\N
2002	37ff5c0e-f635-4e86-9072-8df0176526ec	nl	Indie Brand: Pretty/Pretty Scandal	\N	\N
2003	f2f15f12-e333-41a4-954c-af6c2e75ae14	nl	Handen	\N	\N
2004	40f72ec4-3f0d-42c0-8a4c-040956229cbb	nl	Zool: Kurk	\N	\N
2005	e10da7a8-277a-4d9e-80a7-7cab5020c027	nl	Motief: Tassen	\N	\N
2006	01e8acfb-93aa-4836-82c7-09a817c0e526	nl	Zool: Schuim	\N	\N
2007	f6565864-d9d4-427d-92ad-eeeb628e272d	nl	Bloed	\N	\N
2008	cfe1fb80-23b2-4238-8125-3b9bbb6de577	nl	Object: Schoenclips	\N	\N
2009	2a01e5a5-36ae-40c6-84fa-7ab4b417269c	nl	Indie Brand: Ange	\N	\N
2010	46934c25-bdae-4472-b1ab-c6d170d9487a	nl	Indie Brand: GRAMM	\N	\N
2011	2b129174-161e-4919-a986-8b21485da293	nl	Submerk: Dark Box	\N	\N
2012	84238c3f-1388-4c4c-b3cb-f5dc47b9ad04	nl	Kinderrijmpjes	\N	\N
2013	8d0cb50e-2a4b-4636-afac-a9bc1002fc90	nl	Creamy Mami	\N	\N
2014	5352a8a1-ae65-425e-a1df-d72b8e53a043	nl	Belle en het Beest	\N	\N
2015	da1fc3d9-fe79-4e37-b74e-280d20b427bf	nl	De Notenkraker	\N	\N
2263	7b072ca1-3556-49c7-b118-cc62bdbfc8cc	nl	Planten	\N	\N
2016	62e4ee22-e10a-470a-bb79-2294c85dcebe	nl	Indie Brand: Marchenmerry	\N	\N
2017	275193d3-b21e-4562-a8be-3ef2af28975a	nl	Submerk: Vallee Lys	\N	\N
2018	aeb340c7-31ea-4f9c-8932-7c5cf67daae0	nl	Indie Brand: A+Lidel	\N	\N
2019	d3ec78f2-7115-4b5b-9bf4-d0e88d1816b8	nl	Indie Brand: abilletage	\N	\N
2020	a9c2cbbf-f0a9-4f18-a5e8-021c6af29866	nl	Type: Gilet	\N	\N
2021	f6aa50fc-c64e-46ce-8abf-b9ab47251a89	nl	Indie Brand: Magic Potion	\N	\N
2022	0eec7034-789e-4bba-9199-41457c13dd65	nl	Indie Brand: Dear Margaret	\N	\N
2023	a0085398-5d31-4d00-ab04-7f5b27e75808	nl	Lippenstiften	\N	\N
2024	86cfb6fc-767e-41ac-9fdb-ce81fc98f104	nl	Indie Brand: HMHM	\N	\N
2025	204a527a-1b29-4344-8307-188d50b206b4	nl	Indie Brand: Kazuko Ogawa	\N	\N
2026	07988043-c876-4295-9110-264244c0bc48	nl	Indie Brand: Elpress L	\N	\N
2027	42a02dcc-7aba-4db3-96f8-f63dcb3fb25f	nl	De kleine zeemeermin	\N	\N
2028	fbb1a252-e442-4e8e-b188-9fa767423d72	nl	Submerk: PtMY (Putumayo)	\N	\N
2029	b471d546-4626-42f4-9e99-351fcf54595a	nl	Patroon: Camouflage	\N	\N
2030	ba308f5d-3492-40a9-a622-40a141402c6b	nl	Bruiloften	\N	\N
2031	b0896a36-cf23-497a-881a-9911b37e37be	nl	Indie Brand: Lusty'n Wonderland	\N	\N
2032	8a439fa9-423c-4216-ba72-13b401db3e44	nl	Indie Brand: KidsYoyo	\N	\N
2033	4e536381-e94a-4250-bf61-478c8ef0e0c8	nl	Dolfijnen	\N	\N
2034	6492f5b1-e815-43c0-a3d7-d1897bb84cd3	nl	Gras	\N	\N
2035	a30b090a-3f7e-48c6-ab45-378cfa6e27bc	nl	Olifanten	\N	\N
2036	5e4e4472-c68d-4681-b023-cb14c217c9f2	nl	Patroon: Toile	\N	\N
2037	0cb1a194-e0dc-43a9-a73f-d60d44ddea81	nl	Submerk: Axes Femme Poetique	\N	\N
2038	54de7f53-958c-488c-9f03-2b0f3049069b	nl	Ogen	\N	\N
2039	d841132c-c3ea-4a8e-95a3-f718a21752c4	nl	Deuren	\N	\N
2040	858c1323-7299-4414-8efa-b2bd782d3f4f	nl	Indie Brand: Pina Sweetcollection	\N	\N
2041	1ad9ec2a-58c3-483e-aca7-66de7886b2a0	nl	Kussens	\N	\N
2042	510c43cb-2618-4d37-abed-1fe660631f17	nl	Sneeuwbollen	\N	\N
2043	11fa9af8-353d-4c30-8b1b-43b477e93d2a	nl	Afwerking: Suède	\N	\N
2044	69768313-fab6-40ae-a862-66bd8a1d0b5c	nl	Rapunzel	\N	\N
2045	8f8eccac-d7bb-4032-b73c-e851fe381030	nl	Gevoelige inhoud	\N	\N
2046	8cb3486a-3c32-4cd5-b48a-ebc1f047d40a	nl	Doornroosje	\N	\N
2047	81d371a5-ed25-47db-9d4b-ecb285ae5872	nl	Harpen	\N	\N
2048	13f05c97-ddce-4a9c-bd48-fa1877f2b852	nl	Bedden	\N	\N
2049	b9e47d6a-a543-4d2c-9f2a-92e35d483c1f	nl	Stof: Canvas	\N	\N
2050	01394c41-3bae-4df6-899e-9e9930fe02fd	nl	Indie Brand: Seraphim	\N	\N
2051	5e623ac8-9764-4a79-ac35-5b6408af96f8	nl	Indie Brand: Little Dipper	\N	\N
2052	d36d042c-8884-4c22-afe1-6dcbc1095d4a	nl	Indie Brand: Schwarz Schmetterling	\N	\N
2053	68b435c9-1c3f-41e2-9114-4b2c91a87b9f	nl	Indie Brand: Dandy Puppeteer	\N	\N
2054	25a748ac-5490-4638-bdbd-31f9f94d4f17	nl	Pasen	\N	\N
2055	a80fab5d-74c9-4731-89b5-1e7450b64324	nl	Indie Brand: Visible	\N	\N
2057	a6a4f9ca-0567-4110-a9e0-ed8089e061a9	nl	Laurier	\N	\N
2058	0f393374-49bc-47f1-83aa-496b86f6d242	nl	Print replica	\N	\N
2059	98814024-ac97-47a9-8b19-9feb14cd05ee	nl	Indie Brand: Long Ears Sharp Ears	\N	\N
2061	7012ef73-54a3-495f-9751-7801766b4841	nl	Indie Brand: Dolly House	\N	\N
2062	a2fbc8ea-5831-4fe1-921a-c15230a87683	nl	Theater	\N	\N
2063	1635480b-17d9-49a6-9cfd-2c1a39226829	nl	Pegasus	\N	\N
2064	c5f94629-0062-4ffb-84db-a88cb5009494	nl	Indie Brand: Vierge Vampur	\N	\N
2065	67f0bb4f-d4ea-454c-bc65-0e77e7d68308	nl	Frambozen	\N	\N
2066	fee03109-8754-4a33-879d-2cd7d8b2f9e6	nl	Indie Brand: Miss Point	\N	\N
2067	95b48c4b-d6d2-4208-9247-8e61adf39a85	nl	Indie Brand: Pumpkin Cat	\N	\N
2068	759fb641-c6ab-4dee-80c1-0557b9676d4b	nl	Type: Armwarmers	\N	\N
2069	3dd565c3-73d4-442a-a633-ddc7b7660984	nl	Indie Brand: Me Likes Tea	\N	\N
2070	2ffb943a-efa7-4120-8996-d75818ee3924	nl	Indie Brand: Fantastic Wind	\N	\N
2071	657bdb91-7157-4242-81eb-928f7a2d333b	nl	Indie Brand: Baroque	\N	\N
2072	89da885e-4487-4e7c-8f0c-e16ea45aebce	nl	Indie Brand: Arcadian Deer	\N	\N
2073	84c1d5c8-7ba8-4f64-8aa1-c2cb95649471	nl	Trappen	\N	\N
2074	7a04cf8a-3901-40a7-ad0d-182bf348cfbe	nl	Indie Brand: Strawberry Witch	\N	\N
2075	2016812a-3bcd-45df-a8c1-b1a1d7660bb5	nl	Indie Brand: To Alice	\N	\N
2076	3d25977c-fe58-4e23-95f1-1f0912e5f20e	nl	Horoscoop/Astrologie	\N	\N
2077	f61c7697-6ab4-437d-b3e8-f6c0b6bf43f5	nl	Tarot	\N	\N
2078	0b9279b6-863c-4d23-a7a1-b8ef4a041e14	nl	Indie Brand: Sweet Mildred	\N	\N
2079	a136fdf2-702e-427e-b5cb-5096a5a26cad	nl	Designer: Novala Takemoto	\N	\N
2080	c1b52295-d1ed-4293-9980-05caf47d6749	nl	Indie Brand: Eat Me Ink Me	\N	\N
2081	a4be4a43-fc8e-4ceb-ad54-d18e819a1f4d	nl	Lampen (geen kroonluchters)	\N	\N
2082	148491eb-4c1d-4c84-9220-25d7c6a2a6c3	nl	Het Zwanenmeer	\N	\N
2083	2a678ffe-0422-4f30-ba53-0dde1fbc7528	nl	Spinnen	\N	\N
2084	8c213370-4984-43ed-9f75-d389f39f57e5	nl	Assepoester	\N	\N
2085	87ee31de-bf06-4802-881b-6d41dde2a0b7	nl	Gordijnen	\N	\N
2086	ad686d33-8cda-4b38-b381-7a922aa35a30	nl	Indie Brand: TourNewSoul	\N	\N
2087	13be8970-32e7-4435-b91f-698abc6b2e1c	nl	Patroon: Kleurovergang	\N	\N
2088	c4c439f6-bdbf-43dd-9efe-ebf535332fa7	nl	Lolly's	\N	\N
2089	08fb8d3e-ee0a-4312-9923-4dbe9c6dd7cf	nl	Indie Brand: R. R. Memorandum	\N	\N
2090	bd461446-f28a-45b4-baa8-79f54639a7a8	nl	Zool: Hout	\N	\N
2091	85bfca68-43ba-4b66-89e7-8ef77e524dd7	nl	Taarten	\N	\N
2093	9eccd854-74a2-42e3-bd3f-f721b1436e81	nl	Stof: Corduroy	\N	\N
2094	edd99c4e-caa2-46ae-85b5-86f1879be3a5	nl	Borden	\N	\N
2095	afca0316-fdad-48de-a207-a77dd8464ad0	nl	Muizen	\N	\N
2092	df668af3-5c82-4a25-8076-bd053d8798cd	nl	Motief: Paraplu's	\N	2026-01-04 03:38:03+00
2097	c7299dbe-21cd-4d22-81eb-c86c7d33d43e	nl	Indie Brand: Chocomint	\N	\N
2098	d155164c-d71c-4370-abdb-b0ed0e988427	nl	Marmelades	\N	\N
2099	795ec298-b337-4479-8209-1ecfb49bc7a2	nl	Indie Brand: Automatic Honey	\N	\N
2100	904872ab-3d8c-404c-aa97-d0019945b6fe	nl	Cijfers	\N	\N
2101	70072323-c877-4251-8ac3-f2d3609d133f	nl	Zeemeerminnen	\N	\N
2102	b561e47d-a6d7-463c-b723-735b59444001	nl	Motief: Cosmetica	\N	\N
2103	568a7b2e-30ac-4fd6-8746-f5b6a586c026	nl	Indie Brand: Classical Puppets	\N	\N
2104	f824cf09-ccc4-4d13-8f56-ec51c32572f1	nl	Indie Brand: Marchen die Prinzessin	\N	\N
2105	7d32c077-4354-45c4-bce1-b98a7dbf892f	nl	Indie Brand: R Series	\N	\N
2106	05ce0cf3-8358-4465-b408-c9e0daab384f	nl	Indie Brand: Fairy Wish	\N	\N
2107	545feed3-b37d-4865-8879-c3dc0c630b39	nl	Vossen	\N	\N
2108	ab99b523-5a8b-464a-ac88-040f21c4ae62	nl	Sneeuwwitje	\N	\N
2109	7e541d9c-ae73-4351-bc0b-d194dc9f5d62	nl	Schapen	\N	\N
2110	5d13dd7f-5301-4338-855a-8e090d79a943	nl	Kunst	\N	\N
2111	258fe6f0-9224-4cb9-91f4-8187fc69f0f3	nl	Waaiers	\N	\N
2112	959a0135-9d1a-4ed8-aa0f-8326dd261690	nl	Designer: Imai Kira	\N	\N
2114	54f6e0dd-bc60-4e25-bacc-4a1bbd3b87d1	nl	Schatten	\N	\N
2115	3c8f47ea-c67b-45e0-b61b-48a75b78f35d	nl	Indie Brand: Violet Fane	\N	\N
2116	48c1912d-7660-4c32-8033-85e690d86417	nl	Feeën	\N	\N
2117	ccbebff1-c82e-47e9-ba1e-7fd7a7649866	nl	Wolven	\N	\N
2118	7172edc2-bdfe-4008-af88-4e495bff82bb	nl	Eiffeltoren	\N	\N
2119	d12916ca-4ba4-4b37-9e6a-5e4f9527fb5d	nl	Patroon: Argyle	\N	\N
2120	589e877b-bcbc-410a-a303-54af1ff0f629	nl	Maskers	\N	\N
2121	f27862e1-7cfd-452d-9df9-2082990a74dd	nl	Sanrio	\N	\N
2122	b25a08b2-8abb-4d3c-837c-6f651735b0aa	nl	Motief: Kleding en schoenen	\N	\N
2123	7f292148-671b-47b2-a0b4-bfdff33283af	nl	Vlaggen	\N	\N
2124	c804f702-8b58-42d0-a7a9-89e8f8780e2b	nl	Stijl: Verpleegkundige	\N	\N
2125	5e0b0018-79a9-4adc-9b1c-e5691ec25bda	nl	Indie Brand: Sing a Lullaby for You	\N	\N
2126	3af89989-28c4-4e70-a08c-d4d8de2826c7	nl	Tuinen	\N	\N
2127	f019c054-1904-49d7-ae4e-332bd2946ccc	nl	Indie Brand: Fanplusfriend	\N	\N
2128	5c634064-b597-4c1b-8b18-ccbf67aee6f5	nl	Piraten	\N	\N
2129	4931a57b-e5df-4463-8d9c-f393f696e173	nl	Tandwielen	\N	\N
2130	3d584723-b691-4fa5-9689-ece285f61468	nl	Indie Brand: Diamond Honey	\N	\N
2131	5b36abc1-61d0-4153-b7f3-8f91936897c1	nl	Replica	\N	\N
2132	be8b93cd-f53a-44ae-8e58-76c9198ef34a	nl	Indie Brand: Magic Tea Party	\N	\N
2133	52331933-6c7a-4623-8ee3-28ab7145231f	nl	Russisch Indie Brand	\N	\N
2136	164f79f5-d2ec-4f5a-aed1-a0be99a85795	nl	Bos	\N	\N
2137	761f2b8a-af3e-4634-82fe-58d7d9bdaf21	nl	Spinnenwebben	\N	\N
2138	d337f75a-4ca2-4312-b1fd-484179feaf8c	nl	Donuts	\N	\N
2140	713a3325-daa6-4193-adb2-0e2d54271ee8	nl	Roodkapje	\N	\N
2141	84faadf0-73a0-4fda-9312-8d8d9a44ff13	nl	Disney	\N	\N
2142	ce947ad8-aaf1-42e0-8b24-7bc82274798f	nl	Schaak	\N	\N
2143	ab69d91c-67f6-469f-967e-4ce21f5ae939	nl	Zak horloges	\N	\N
2144	fb3bf2f7-f2b0-4281-9659-752ee8e35495	nl	Schepen	\N	\N
2145	5e4dcb60-545e-4191-bd57-24a685552618	nl	Piano's	\N	\N
2147	e013d9b6-7b13-40f4-8e99-fa6a74f6a5d2	nl	Indie Brand: Elegy	\N	\N
2148	4d56a435-3e90-4bfc-aeed-ec9bbf7ca9e4	nl	Kerken/Kathedralen	\N	\N
2149	d86a7b2f-2457-4018-a5ac-fecad9d1a209	nl	Spiegels	\N	\N
2150	94b2de49-b081-4dc9-acc3-f10ef8b6bf42	nl	Kerst	\N	\N
2151	fbc9d213-e837-4c45-9ebc-1d9cc334a398	nl	Glas-in-lood	\N	\N
2152	6d991b39-5b78-42f9-9490-3188b2e3d26e	nl	Motief: Schoenen	\N	\N
2153	137c117d-f0b5-4057-8507-322a4105f86e	nl	Submerk: Lapin Agill	\N	\N
2154	34793d93-33ca-400b-b057-ff45ac786694	nl	Ballerina's	\N	\N
2155	a02b26f4-7e97-4416-b6e2-4aa0f1975fb7	nl	Doornen	\N	\N
2157	e7e024ca-72b0-46c2-afe0-796c2d300069	nl	Stof: Geweven Polyester	\N	\N
2160	3711838d-d5d0-42ce-a615-31487c6efa27	nl	Indie Brand: Lumiebre	\N	\N
2161	97726e25-dd5e-4dff-a852-4f599497db61	nl	Viooltjes	\N	\N
2162	903c3cf3-536a-4442-b3b9-7f54c3fbde33	nl	Vorken	\N	\N
2163	0fe23d8f-74bf-46d6-b8d8-26c3a4c24834	nl	Stof: Denim	\N	\N
2164	ac29b233-3faa-4925-97d3-14d3ee739ffb	nl	Bubbels	\N	\N
2165	45db235f-2761-4755-9cd8-ea632b1f79ce	nl	Kant	\N	\N
2166	77a18fde-ee4c-4ebd-a84d-9cab54f69526	nl	Motief: Hoeden	\N	\N
2167	14f4cf79-1d20-49fb-8d78-937f458dac31	nl	Type: Lucky Pack	\N	\N
2168	254fd547-57bd-4624-948a-e8a97f92422d	nl	Eekhoorns	\N	\N
2170	cc84e20d-75cd-4b81-87ee-c08d9b5c3ff8	nl	Klaveren	\N	\N
2171	2b00ee01-6459-41c6-ab59-6aec76a485ca	nl	Ornamenten	\N	\N
2172	42ea103a-ec7e-4fc9-8e94-cca96fc652df	nl	Stijl: Dienstmeisje	\N	\N
2173	216ab08e-d139-410d-9f14-cc6b7027e06b	nl	Poppen	\N	\N
2174	09997f04-4899-4074-9f9d-031466302f89	nl	Paddestoelen	\N	\N
2175	b0aa776c-eda7-482f-8d48-2da2db150e3d	nl	Vogelkooien	\N	\N
2176	0c742330-c88e-41da-ad2f-4a8c260f57dd	nl	Poorten/Hekken	\N	\N
2177	810314ff-b250-4e7b-8c38-4b745a526967	nl	Citroenen	\N	\N
2178	9d8d799a-6e93-424b-a0ba-4cd0a8cfb776	nl	Doodskisten	\N	\N
2179	111d14e4-8aaa-4509-82f4-fd9f3a2f00fc	nl	Afwerking: Glanzend/Lakleer	\N	\N
2180	ae6d2068-4e7b-40c1-a10f-2a73b1289613	nl	Violen	\N	\N
2181	4df05feb-9688-4c7b-9974-0d40ac2bfc15	nl	Patroon: Pied-de-poule/Hanenpoot	\N	\N
2182	c115f273-3ddd-432b-b036-9d3c3823c3a4	nl	Parfums	\N	\N
2183	774c4752-36d5-4bda-a358-de2bdfcd552c	nl	Circus	\N	\N
2184	f500e424-9b4e-4a43-bb9e-3f84f76df7f9	nl	Stoelen	\N	\N
2185	10e8bc10-e26a-478a-b7f9-263fb286ce3a	nl	Slagroom	\N	\N
2186	f32b774a-d0c1-475e-8c9c-17a2e5f3fdae	nl	Eenhoorns	\N	\N
2187	93444f7a-f41e-43e6-9c31-e04e75a9369c	nl	Schoppen	\N	\N
2188	8f593035-b0cc-482f-b600-b51027bf558e	nl	Schelpen	\N	\N
2189	056db6ae-9eda-403e-8630-0bc09aa58943	nl	Patroon: Damask	\N	\N
2190	dc8f3636-63e9-4c2b-b9f0-99b58b4f9331	nl	Leeuwen	\N	\N
2191	b3d0457b-ba5b-495a-8f26-afae76e9c7e8	nl	Ankers	\N	\N
2192	9e2ede1e-6847-4bd4-b2b8-2e0fef3acdc8	nl	Motief: Dieren	\N	\N
2193	27b9a3b1-46c7-4439-bf86-21f6e7f18f0e	nl	Type: Schort	\N	\N
2194	1dcd303c-ab56-41c0-a668-5daa73a86460	nl	Type: Sluier	\N	\N
2195	90298b53-5960-4b91-9571-7ff0545a5ba4	nl	Type: Canotier	\N	\N
2196	a244589a-1a2d-4977-86b3-c163600d05d7	nl	Koetsen	\N	\N
2197	2c0e20ff-09cb-4542-a5ab-5a1798e7c32b	nl	Sneeuwvlokken	\N	\N
2198	1e615461-f8e5-4627-ac8b-c27afe84ea54	nl	Materiaal: Plastic	\N	\N
2199	034a7d78-2c42-441a-8eb9-b9eb2a66919e	nl	Meubelen	\N	\N
2200	5cfcf9e5-a425-4541-9587-ab532506f644	nl	Macarons	\N	\N
2201	f4fd2742-16a4-4fef-827d-ec57fd313c3c	nl	Type: Handschoenen	\N	\N
2202	cfa01ebf-44a9-44fc-a914-4f555e17ecd5	nl	Submerk: MAM	\N	\N
2204	a1e8f6d6-8256-4272-a43f-6007f7fbd604	nl	Stof: Leer	\N	\N
2205	71ee2101-150b-4f58-a2db-365029f22331	nl	Lepels	\N	\N
2206	54d0c06d-faeb-4b24-b0ee-74d04d7d0a5b	nl	Heksen/Magie	\N	\N
2207	fe69cd09-d2c4-4182-a241-cac26f2335e8	nl	Cadeautjes	\N	\N
2208	aa666862-3dc3-48bc-929c-666ee9889285	nl	Submerk: Crown Label	\N	\N
2209	e1cd8467-2bdc-42fb-81a9-5ce9508f7eca	nl	Ramen	\N	\N
2210	acc3d253-4b8e-4003-9f6d-fed28e884c6d	nl	Submerk: Axes Femme Kawaii	\N	\N
2211	a85026f7-a04f-40fd-a578-95bd475e539f	nl	Cupcakes/Muffins	\N	\N
2212	fa292233-6a0c-4378-a83b-a67c732f8a85	nl	Materiaal: Stro/Riet	\N	\N
2213	c738f3a4-ac46-4b9e-b4f9-89501fdd269f	nl	Detail: Rickrack	\N	\N
2215	c2f00d40-f2cf-4ae7-81f2-4f1b2c7eab97	nl	Bomen	\N	\N
2216	582aaf5e-0656-4059-967f-0b6c73752a59	nl	Appels	\N	\N
2217	758fd1d9-4248-4446-9448-1096ba8757c9	nl	Ballonnen	\N	\N
2218	fcbd1189-918a-41d2-9e96-761b4bd4de0f	nl	Gebouwen	\N	\N
2219	2af2b193-c7b4-4781-bdf7-d1ef9f5ee194	nl	Carrousels	\N	\N
2220	9a4d8906-98fa-4a8e-91be-f011d7134b71	nl	Type: Scrunchie/Haarelastiekje	\N	\N
2221	df261473-2a70-4ed5-8dd7-91452051eff4	nl	Flessen	\N	\N
2222	190a6975-e382-4ad1-b20a-92c3d60c8007	nl	Poedels	\N	\N
2223	17d38bc2-6f4f-47f3-98e6-4cf3e767579f	nl	Astronomie/Ruimtevaart	\N	\N
2224	b4b7051e-a22e-4012-9c20-1252515004c9	nl	Marine	\N	\N
2225	f33fea20-4c70-40cd-9af9-91819f2134f4	nl	Stof: Keperstof	\N	\N
2226	0db4ef1f-effb-4d29-b917-574a470e51b3	nl	Koreaans Indie Brand	\N	\N
2227	4f05986b-e3ef-4ee2-ad27-b255883e4b64	nl	IJsjes	\N	\N
2228	ec3d8362-6dfc-4c21-a161-6f3d5fda75fc	nl	Witte Konijn	\N	\N
2229	ff5b6c81-5d78-4306-a554-799fa02744f7	nl	Rendier/Hert/Bambi	\N	\N
2230	959a70e3-06fd-4acc-9a65-1ff931c03a32	nl	Schilderijen	\N	\N
2231	655a77a7-0d31-4fcb-808a-ec1bc3391175	nl	Honden/Puppy's	\N	\N
2232	10cb852f-faec-489d-8fae-50023abca73a	nl	Kroonluchters	\N	\N
2233	38990061-0827-45a9-89d3-ef949c89ae50	nl	Kopjes	\N	\N
2234	61f8be95-829a-44ab-a146-58d750e77d47	nl	Stof: Crêpe de Chine	\N	\N
2235	ac069808-12bd-4339-bd18-0a944d73da9d	nl	Type: Armband	\N	\N
2236	8e43623d-26fe-4dc2-ba13-ff0200b0fb98	nl	Stof: Gobelin	\N	\N
2237	8b6265e5-a2f8-4099-a7d3-2365d89ee879	nl	Halloween	\N	\N
2238	85f32a89-7fea-4d07-b60b-dcf53f045578	nl	Brieven/Post	\N	\N
2239	d806236c-3854-46bc-a474-7ac99aeb8a61	nl	Instrumenten	\N	\N
2240	9a50e334-7852-4e30-9aea-5fe677cf205b	nl	Detail: Flockprint	\N	\N
2241	833619de-fabc-409b-bf3d-fd986cccb52e	nl	Kaarsen	\N	\N
2242	3ab7fa9e-0219-4418-84dd-28898c3cda44	nl	Religieuze motieven	\N	\N
2243	abf6935b-8032-4e52-9e50-e1189c629512	nl	Type: Oorbellen	\N	\N
2244	6bddda82-3da0-4671-952c-da5d8b6dcbe2	nl	Madeliefjes	\N	\N
2245	bf2736c4-0056-4517-82d8-cc05d2c2e4a8	nl	Konijnenberen	\N	\N
2246	31fc1b44-0788-48f6-9edc-f1826f7bbce0	nl	Wolken	\N	\N
2247	25b480f5-48b9-445b-93de-cc2d26e32dbe	nl	Zool: Rubber	\N	\N
2248	078d36ba-7645-4a50-8cbb-47555c4c0300	nl	Speelgoed	\N	\N
2249	984ef551-6a4d-4602-8c44-5e4ffd17b329	nl	Royalty	\N	\N
2250	b7a6c010-6e2b-4478-aad6-60a13c7174b5	nl	Vleermuizen	\N	\N
2251	cd1f0d47-08f4-4a32-9273-1ef117aaecf4	nl	Desserts	\N	\N
2252	29b84e71-56f0-4d95-8edd-948e545847e4	nl	Speelkaarten	\N	\N
2253	93042fe7-b712-4174-b2a7-ff345e0e4aa6	nl	Schedels	\N	\N
2254	ceab0b21-0aef-4908-bfe6-8dba6a63999a	nl	Bestek	\N	\N
2255	9430230c-f046-435a-bf03-732773251928	nl	Camee	\N	\N
2256	9175810c-90fe-4acb-8b85-42d064b8e4f5	nl	Muziek	\N	\N
2257	72b53869-f3da-4f88-8126-056df30e1057	nl	Tassels/Kwastjes	\N	\N
2258	2de9e121-5651-478c-8a39-4a4edc049ebe	nl	Boeken	\N	\N
2259	8b30ccf3-b11d-4067-a877-cc9b1b6ab482	nl	Stijl: Leger	\N	\N
2260	de414a89-16df-4cb6-aca2-fc795415d8bc	nl	Stof: Shantung	\N	\N
2261	d5fb88f6-8ee0-4719-9682-911f1aa1e9c2	nl	Detail: Pompoms	\N	\N
2262	200b47c8-3fb0-4cf4-8bda-f9ceeab03300	nl	Sprookjes	\N	\N
2264	023e3f85-40ca-4ab0-965f-de2749c8ca29	nl	Afwerking: Matte	\N	\N
2265	9d679cea-1dc6-43ab-84db-4308ab88bf69	nl	Patroon: Kantprint	\N	\N
2266	04fd0dcd-e706-4b83-aab5-eb5500deba4a	nl	Detail: Appliqué	\N	\N
2267	558f4b51-2094-47f0-a558-4415fbc79264	nl	Type: Wrist Cuffs	\N	\N
2268	e1448e60-ce4d-4291-83e7-65c8b154e7e3	nl	Architectuur	\N	\N
2269	79a5d8b7-83ec-452e-b86b-de09b28af4ba	nl	Kastelen	\N	\N
2270	d2f05649-7adc-40b4-a20e-3dd71f99e1ee	nl	Oost-Aziatisch	\N	\N
2271	f4292a67-e8e6-4c5a-83d8-5ad559761713	nl	Thee	\N	\N
2272	1b14b999-2f4a-4d3d-9bfa-a536ca339bfa	nl	Kralen	\N	\N
2273	3674697a-ae1e-4188-81b4-8dc699894a35	nl	Materiaal: Acrylhars	\N	\N
2275	a65f1189-e16c-43b7-8d10-fa1ddcda6be2	nl	Vleugels	\N	\N
2276	cae850b4-811f-4c21-9d87-222c3d7fb80f	nl	Muzieknoten	\N	\N
2277	409ac7eb-9b4a-455f-a21d-e659d22229d8	nl	Klokken	\N	\N
2278	72e592f8-bcc0-4b6f-a36e-c71e97f26c5b	nl	Boeketten	\N	\N
2279	8371d116-6102-4855-95c0-75ccd2bafc85	nl	Zwanen	\N	\N
2280	bdf7a0ab-8d53-491d-a7cf-5760da8e7546	nl	Cake	\N	\N
2281	cc925d7c-707f-4d34-8a2f-dcca88622ea9	nl	Koekjes	\N	\N
2282	3ec8747a-fee5-4ec8-811a-5f5c8f406c61	nl	Voedsel	\N	\N
2284	2c1ab46d-4ab3-41c8-b5d5-afdc4749f622	nl	Patroon: Krijtstrepen	\N	\N
2285	1e88d3eb-7a32-422d-9116-522cff35fdbc	nl	Type: Kam	\N	\N
2286	e4437025-c44f-40d1-abca-31e7d8aa6261	nl	Type: Choker	\N	\N
2287	f025198a-76b9-43d6-9fce-1b0607e490b4	nl	Veren	\N	\N
2288	b26835ea-c268-47b4-801b-0171ef111da2	nl	Kettingen	\N	\N
2289	209fa323-d81f-4a14-862d-b181e2df9411	nl	Type: Bonnet	\N	\N
2290	61aff707-1ec0-402d-a382-04db8d1e7408	nl	Stof: Wol	\N	\N
2291	e26cea64-2b6f-4a67-bb06-08177a6db0a9	nl	Sleutels	\N	\N
2292	6a9d0dcb-d98d-4787-9dfa-f1ddf95e86c5	nl	Chocolaatjes	\N	\N
2293	fa15a4ef-9b01-42d7-b4c4-81c143de8c5f	nl	Stof: Satijn	\N	\N
2294	2535508b-c990-4666-a7b3-da6f85829566	nl	Fleur de lis	\N	\N
2295	724b2379-3daa-4cd2-a7ac-2f2290861d78	nl	Stof: Organdi/Organza	\N	\N
2296	f3d6dae7-fa1f-4652-ac96-e41604e9819a	nl	Paarden/Pony's	\N	\N
2297	04dd7ad4-d36d-4926-8915-1c52704d1c2d	nl	Japans Indie Brand	\N	\N
2298	0576b53a-c59f-4682-9b2f-1415b043265b	nl	Type: Broche/Sierspeld	\N	\N
2299	3010ad34-21c5-4df0-a4a5-cb6e1eee7a07	nl	Snoepjes	\N	\N
2300	6aab9ef6-e7e1-4457-b819-3f0a6fc5a165	nl	Dierenoren	\N	\N
2301	963f404f-02ac-4ca7-9a67-d3c354e1aec4	nl	Patroon: Regimentsstrepen	\N	\N
2302	5ceb8a7f-7d98-4197-ad07-1a4edaee6e7a	nl	Heraldiek	\N	\N
2303	dea6fcc5-dfc9-4e93-8016-b1a33ed178cb	nl	Stof: Burberry	\N	\N
2304	c8dfbb9e-aac2-4a7d-94d4-23553d600819	nl	Vogels	\N	\N
2305	bb2b6a63-aa52-4235-bd8f-21e332d0994e	nl	Detail: Gebreid	\N	\N
2306	d88902b0-9164-4595-a15f-ffdce28f8c0f	nl	Manen	\N	\N
2307	bc777600-18a9-4ec1-b935-fcdc843d71b5	nl	Vlinders	\N	\N
2308	fa468a33-4710-42d5-aabb-bb2b56a0bd35	nl	Alice in Wonderland	\N	\N
2309	d4f0390a-595c-4870-aa7a-feee080d4a85	nl	Diamanten	\N	\N
2310	6af0c4fc-f05a-46ad-823c-8a0f37081084	nl	Stof: Tule	\N	\N
2311	3c6e9b58-d567-4d96-a289-44fce7e0adf6	nl	Type: Ring	\N	\N
2312	247fe0c3-96a4-45cf-ab9b-b72e74a786d0	nl	Kleuren (kaartterm)	\N	\N
2313	8026e2b8-825f-4cf5-b061-7e9095c2c6fb	nl	Stof: Jacquard	\N	\N
2314	f3d80995-3dd3-460d-ad39-1a042c7e82d5	nl	Stijl: Marine	\N	\N
2315	6e8844be-b360-49bf-81ed-1284f82ae109	nl	Kersen	\N	\N
2316	20d3f0f3-a98c-45d7-a2c8-adb29ae4df83	nl	Stof: Synthetisch leer	\N	\N
2317	94d96cf4-bd36-4614-b091-2f7de813aaed	nl	Detail: Glitter	\N	\N
2318	75f5b041-0f50-4f36-ba88-75e53255b8fa	nl	Fruit	\N	\N
2319	b9a11a81-6e75-4664-bad8-74d7d7350dd9	nl	Abstracte decoraties	\N	\N
2320	a9126e03-66ea-4b48-9b4e-187526246502	nl	Snoepgoed	\N	\N
2321	81bd4871-5340-4eb0-9467-c2b03d265288	nl	Stof: Broadcloth/Poplin	\N	\N
2322	62a1429a-38e1-4cda-b1fd-714c453a6eac	nl	Kaders	\N	\N
2323	aafdb820-cbef-4f2e-a23c-b263c2b07c8e	nl	Chinees Indie Brand	\N	\N
2324	0db54482-a318-47f6-ae2b-84d37c5e0dc3	nl	Patroon: Gingham/Brabants bont	\N	\N
2325	14f4fd24-cf61-454e-95ea-61d9a8d76432	nl	Samenwerking	\N	\N
2326	c807ad8e-86e3-4352-8c46-63303a2c2983	nl	Stof: Imitatiebont	\N	\N
2328	5b55d2ef-d295-41b2-bcd8-cba97003a7c1	nl	Westers Indie Brand	\N	\N
2329	e3c2268f-6977-4aaf-9106-1685bcf4cc16	nl	Type: Haarclip	\N	\N
2330	d2e25328-0a2c-414f-93a3-2ffa9ac1875e	nl	Type: Hoed	\N	\N
2331	30d5df5e-2306-445b-ada3-50000431ba72	nl	Figuren	\N	\N
2332	d3a21074-e48d-4443-acd5-e11cfbafdf96	nl	Katten	\N	\N
2333	9bca6dec-3592-480f-b1c2-7e9ef90d2dd3	nl	Aardbeien	\N	\N
2334	9e86b439-c4f5-495a-8b7f-954af61d13db	nl	Beren	\N	\N
2335	d5869c48-5d65-43ea-8c73-179745cb6172	nl	Type: Ketting	\N	\N
2274	82d98b84-7ca4-49d7-b09c-39cbe93707cb	nl	Motief: Juwelen	\N	2026-02-07 02:41:58+00
2336	e967aea5-ecc9-4661-ba28-c53ced6eb086	nl	Stof: Velveteen/Katoenfluweel	\N	\N
2337	c58a7438-185a-4164-b604-22333329b6a9	nl	Motief: Linten/Strikjes	\N	\N
2338	4778ff65-9521-4f3c-9c79-17f896cf5e4d	nl	Stof: Kant	\N	\N
2339	1ffe0b29-33e8-4ae8-8bef-0f9f1170b381	nl	Patroon: Ruiten/Tartan	\N	\N
2340	ee207d84-d31c-41fd-8f2a-d969aa561124	nl	Kruisen	\N	\N
2341	9d6dd0a2-4895-441b-a15f-6d46f79948dd	nl	Konijnen	\N	\N
2342	9dbf01d4-ebab-4ba2-916b-37cd9b13ad43	nl	Dieren	\N	\N
2343	98189ad6-9575-4c0f-a0d8-386e7b91fa8a	nl	Sterren	\N	\N
2344	21c2f99b-c3a4-4524-9f6c-590444596104	nl	Stof: Chiffon	\N	\N
2345	7130552e-4b7d-4fb7-b2a6-981a74ac172b	nl	Type: Haarband	\N	\N
2346	d275af53-605d-4f78-8c23-cc9b88a44fea	nl	Detail: Borduursel	\N	\N
2347	09c8a2c1-36ac-4050-b4f8-9de25dde2114	nl	Patroon: Polkadot	\N	\N
2348	f8cdc971-1c61-4ac8-a185-2742420a71ff	nl	Parels	\N	\N
2349	ce42a0bd-7fe6-4042-9142-33179cca6a3e	nl	Kronen	\N	\N
2350	60667b47-f661-4db0-ab56-74becad8d567	nl	Patroon: Strepen	\N	\N
2351	1ff3901d-1ece-4e79-b35c-067450b7bb74	nl	Harten	\N	\N
2352	ea72fb7f-f55f-410a-a659-580d731b59af	nl	Detail: Strikjes	\N	\N
2353	9b15d05a-acab-49e8-9eb6-1388c47bb6bf	nl	Kleuren: onvolledig	\N	\N
2354	70c0964e-2f5c-4b79-9dea-b36fde2ceea1	nl	Schrijfwerk	\N	\N
2355	b5834ea3-ae9c-4c73-ad86-5cde023c37ad	nl	Bloemen	\N	\N
2356	7a2f96ca-d48e-4b6c-bc29-15a42d1154a1	nl	Gedeeltelijk (onvolledige informatie)	\N	\N
2357	5287901a-111a-49a0-b3dd-a32052a8eef3	nl	Rozen	\N	\N
2358	13c39cd7-9b84-49c6-b17f-ef8c2f9a9247	nl	Patroon: Effen	\N	\N
2359	0ab74d6e-93da-43f4-a61a-2caf29f993a4	nl	Designer: Yoh	\N	\N
2360	0c7a09b1-b232-41f2-aca6-da88bc122cff	nl	Indie Brand: Algonquins	\N	\N
2361	10bc2543-3f54-4f6a-a6ae-929ef7a570f4	nl	Indie Brand: Cruel Arcadia	\N	\N
2363	301d7f4c-081d-4154-b068-161bf0e59973	nl	Submerk: na-th	\N	\N
2364	3caa67e0-6937-4d53-9417-b7e4c56edca0	nl	Indie Brand: Coquette Doll	\N	\N
2365	3cade109-a31e-463c-9e67-c9695d78132e	nl	Indie Brand: Carina e Arlequin	\N	\N
2366	4f340ddf-e627-4d7f-807e-7a19fbdad7b3	nl	Submerk: Axes Femme Kids	\N	\N
2367	548c1595-aa23-40b4-b7db-5663a1cdb58f	nl	Indie Brand: Moonrise Theater	\N	\N
2368	58347588-7557-4c33-b879-4381ec107ee9	nl	Indie Brand: Larmes de Angel	\N	\N
2369	6c8c228f-24f0-4cb5-a6b3-3f7aec1915eb	nl	Submerk: Mille Noirs	\N	\N
2370	6ea63e4b-12e1-4218-9759-a3a99c31ef32	nl	Indie Brand: Kaneko	\N	\N
2371	94fb064a-25cc-4169-b768-a3aa8456382d	nl	Submerk: Axes Femme Nostalgie	\N	\N
2372	c4fa69cf-002a-48a9-8ee9-bf1869fe4e34	nl	Patroon: Schaakbord	\N	\N
3158	0ab74d6e-93da-43f4-a61a-2caf29f993a4	fr	Créateur.rice : Yoh	\N	\N
3159	0c7a09b1-b232-41f2-aca6-da88bc122cff	fr	Marque indépendante : Algonquins	\N	\N
3160	10bc2543-3f54-4f6a-a6ae-929ef7a570f4	fr	Marque indépendante : Cruel Arcadia	\N	\N
3161	13c39cd7-9b84-49c6-b17f-ef8c2f9a9247	fr	Motif : Uni (seulement pour les OP, JSK et jupes)	\N	\N
3162	1ffe0b29-33e8-4ae8-8bef-0f9f1170b381	fr	Motif : Carreaux, Tartan	\N	\N
3163	247fe0c3-96a4-45cf-ab9b-b72e74a786d0	fr	Suites (symboles sur les cartes de poker)	\N	\N
3165	301d7f4c-081d-4154-b068-161bf0e59973	fr	Sous-marque : Na-th	\N	\N
3166	3caa67e0-6937-4d53-9417-b7e4c56edca0	fr	Marque indépendante : Coquette Doll	\N	\N
3167	3cade109-a31e-463c-9e67-c9695d78132e	fr	Marque indépendante : Carina e Arlequin	\N	\N
3168	4f340ddf-e627-4d7f-807e-7a19fbdad7b3	fr	Sous-marque : Axes Femme Kids	\N	\N
3169	548c1595-aa23-40b4-b7db-5663a1cdb58f	fr	Marque indépendante : Moonrise Theater	\N	\N
3170	58347588-7557-4c33-b879-4381ec107ee9	fr	Marque indépendante : Larmes de Angel	\N	\N
3171	6c8c228f-24f0-4cb5-a6b3-3f7aec1915eb	fr	Sous-marque : Mille Noirs	\N	\N
3172	6ea63e4b-12e1-4218-9759-a3a99c31ef32	fr	Marque indépendante : Kaneko	\N	\N
3173	94fb064a-25cc-4169-b768-a3aa8456382d	fr	Sous-marque : Axes Femme Nostalgie	\N	\N
3174	c4fa69cf-002a-48a9-8ee9-bf1869fe4e34	fr	Motif : Damier	\N	\N
3175	6a1a4ace-d5e0-45c6-8e7a-cbe766abe71c	it	Peter Pan	\N	\N
3176	2edf7bbb-39f9-4f90-aee4-4b1476a93d23	it	Colombe	\N	\N
3177	2187df4b-282c-4186-aa2a-3f8011f27ffc	it	Occhiali da sole	\N	\N
3178	f2f15f12-e333-41a4-954c-af6c2e75ae14	it	Mani	\N	\N
3179	f6565864-d9d4-427d-92ad-eeeb628e272d	it	Sangue	\N	\N
3180	5352a8a1-ae65-425e-a1df-d72b8e53a043	it	La bella e la bestia	\N	\N
3181	da1fc3d9-fe79-4e37-b74e-280d20b427bf	it	Lo schiaccianoci	\N	\N
3182	a0085398-5d31-4d00-ab04-7f5b27e75808	it	Rossetti	\N	\N
3183	ba308f5d-3492-40a9-a622-40a141402c6b	it	Matrimoni	\N	\N
3184	4e536381-e94a-4250-bf61-478c8ef0e0c8	it	Delfini	\N	\N
3185	6492f5b1-e815-43c0-a3d7-d1897bb84cd3	it	Erba	\N	\N
3186	a30b090a-3f7e-48c6-ab45-378cfa6e27bc	it	Elefanti	\N	\N
3187	54de7f53-958c-488c-9f03-2b0f3049069b	it	Occhi	\N	\N
3188	d841132c-c3ea-4a8e-95a3-f718a21752c4	it	Porte	\N	\N
3189	1ad9ec2a-58c3-483e-aca7-66de7886b2a0	it	Cuscini	\N	\N
3190	510c43cb-2618-4d37-abed-1fe660631f17	it	Palle di vetro con neve	\N	\N
3191	69768313-fab6-40ae-a862-66bd8a1d0b5c	it	Raperonzolo	\N	\N
3192	8cb3486a-3c32-4cd5-b48a-ebc1f047d40a	it	La bella addormentata	\N	\N
3193	81d371a5-ed25-47db-9d4b-ecb285ae5872	it	Arpe	\N	\N
3194	13f05c97-ddce-4a9c-bd48-fa1877f2b852	it	Letti	\N	\N
3195	25a748ac-5490-4638-bdbd-31f9f94d4f17	it	Pasqua	\N	\N
3196	67f0bb4f-d4ea-454c-bc65-0e77e7d68308	it	Lamponi	\N	\N
3197	f61c7697-6ab4-437d-b3e8-f6c0b6bf43f5	it	Tarocchi	\N	\N
3198	2a678ffe-0422-4f30-ba53-0dde1fbc7528	it	Ragni	\N	\N
3199	8c213370-4984-43ed-9f75-d389f39f57e5	it	Cenerentola	\N	\N
3200	87ee31de-bf06-4802-881b-6d41dde2a0b7	it	Tende	\N	\N
3201	c4c439f6-bdbf-43dd-9efe-ebf535332fa7	it	Lecca lecca	\N	\N
3202	edd99c4e-caa2-46ae-85b5-86f1879be3a5	it	Piatti	\N	\N
3203	afca0316-fdad-48de-a207-a77dd8464ad0	it	Topi	\N	\N
3204	d155164c-d71c-4370-abdb-b0ed0e988427	it	Marmellate	\N	\N
3205	904872ab-3d8c-404c-aa97-d0019945b6fe	it	Numeri	\N	\N
3206	545feed3-b37d-4865-8879-c3dc0c630b39	it	Volpi	\N	\N
3207	ab99b523-5a8b-464a-ac88-040f21c4ae62	it	Biancaneve	\N	\N
3208	7e541d9c-ae73-4351-bc0b-d194dc9f5d62	it	Pecore	\N	\N
3209	ccbebff1-c82e-47e9-ba1e-7fd7a7649866	it	Lupi	\N	\N
3210	589e877b-bcbc-410a-a303-54af1ff0f629	it	Maschere	\N	\N
3211	7f292148-671b-47b2-a0b4-bfdff33283af	it	Bandiere	\N	\N
3212	5c634064-b597-4c1b-8b18-ccbf67aee6f5	it	Pirati	\N	\N
3213	761f2b8a-af3e-4634-82fe-58d7d9bdaf21	it	Ragnatele	\N	\N
3214	ce947ad8-aaf1-42e0-8b24-7bc82274798f	it	Scacchi	\N	\N
3215	d86a7b2f-2457-4018-a5ac-fecad9d1a209	it	Specchi	\N	\N
3216	94b2de49-b081-4dc9-acc3-f10ef8b6bf42	it	Natale	\N	\N
3217	34793d93-33ca-400b-b057-ff45ac786694	it	Ballerine	\N	\N
3218	903c3cf3-536a-4442-b3b9-7f54c3fbde33	it	Forchette	\N	\N
3219	ac29b233-3faa-4925-97d3-14d3ee739ffb	it	Bolle	\N	\N
3220	254fd547-57bd-4624-948a-e8a97f92422d	it	Scoiattoli	\N	\N
3221	216ab08e-d139-410d-9f14-cc6b7027e06b	it	Bambole	\N	\N
3222	09997f04-4899-4074-9f9d-031466302f89	it	Funghi	\N	\N
3223	810314ff-b250-4e7b-8c38-4b745a526967	it	Limoni	\N	\N
3224	ae6d2068-4e7b-40c1-a10f-2a73b1289613	it	Violini	\N	\N
3225	c115f273-3ddd-432b-b036-9d3c3823c3a4	it	Profumi	\N	\N
3226	f500e424-9b4e-4a43-bb9e-3f84f76df7f9	it	Sedie	\N	\N
3227	8f593035-b0cc-482f-b600-b51027bf558e	it	Conchiglie	\N	\N
3228	dc8f3636-63e9-4c2b-b9f0-99b58b4f9331	it	Leoni	\N	\N
3229	2c0e20ff-09cb-4542-a5ab-5a1798e7c32b	it	Fiocchi di neve	\N	\N
3230	71ee2101-150b-4f58-a2db-365029f22331	it	Cucchiai	\N	\N
3231	54d0c06d-faeb-4b24-b0ee-74d04d7d0a5b	it	Magia / Streghe	\N	\N
3232	e1cd8467-2bdc-42fb-81a9-5ce9508f7eca	it	Finestre	\N	\N
3233	c2f00d40-f2cf-4ae7-81f2-4f1b2c7eab97	it	Alberi	\N	\N
3234	582aaf5e-0656-4059-967f-0b6c73752a59	it	Mele	\N	\N
3235	758fd1d9-4248-4446-9448-1096ba8757c9	it	Palloncini	\N	\N
3236	df261473-2a70-4ed5-8dd7-91452051eff4	it	Bottiglie	\N	\N
3237	4f05986b-e3ef-4ee2-ad27-b255883e4b64	it	Gelati	\N	\N
3238	959a70e3-06fd-4acc-9a65-1ff931c03a32	it	Dipinti	\N	\N
3239	655a77a7-0d31-4fcb-808a-ec1bc3391175	it	Cani/Cuccioli	\N	\N
3240	833619de-fabc-409b-bf3d-fd986cccb52e	it	Candele	\N	\N
3241	6bddda82-3da0-4671-952c-da5d8b6dcbe2	it	Margherite	\N	\N
3242	bf2736c4-0056-4517-82d8-cc05d2c2e4a8	it	Conigliorsi	\N	\N
3243	31fc1b44-0788-48f6-9edc-f1826f7bbce0	it	Nuvole	\N	\N
3244	b7a6c010-6e2b-4478-aad6-60a13c7174b5	it	Pipistrelli	\N	\N
3245	93042fe7-b712-4174-b2a7-ff345e0e4aa6	it	Teschi	\N	\N
3246	9175810c-90fe-4acb-8b85-42d064b8e4f5	it	Musica	\N	\N
3247	2de9e121-5651-478c-8a39-4a4edc049ebe	it	Libri	\N	\N
3248	7b072ca1-3556-49c7-b118-cc62bdbfc8cc	it	Piante	\N	\N
3249	a65f1189-e16c-43b7-8d10-fa1ddcda6be2	it	Ali	\N	\N
3250	409ac7eb-9b4a-455f-a21d-e659d22229d8	it	Orologi	\N	\N
3251	bdf7a0ab-8d53-491d-a7cf-5760da8e7546	it	Torte	\N	\N
3252	0b9279b6-863c-4d23-a7a1-b8ef4a041e14	it	Brand Indie: Sweet Mildred	\N	\N
3253	17d38bc2-6f4f-47f3-98e6-4cf3e767579f	it	Astronomia/Spazio	\N	\N
3254	8a439fa9-423c-4216-ba72-13b401db3e44	it	Brand Indie: KidsYoyo	\N	\N
3255	30d5df5e-2306-445b-ada3-50000431ba72	it	Figure	\N	\N
3256	111d14e4-8aaa-4509-82f4-fd9f3a2f00fc	it	Finitura: Lucida	\N	\N
3257	0184ac6f-3d84-4b7f-bd84-af44b07bf376	it	Kuragehime	\N	\N
3258	8b30ccf3-b11d-4067-a877-cc9b1b6ab482	it	Stile: Militare	\N	\N
3259	3c8f47ea-c67b-45e0-b61b-48a75b78f35d	it	Brand Indie: Violet Fane	\N	\N
3260	10bc2543-3f54-4f6a-a6ae-929ef7a570f4	it	Brand Indie: Cruel Arcadia	\N	\N
3261	3750a78a-5976-49ca-b205-f6bbac64975c	it	Brand Indie: Uf	\N	\N
3262	3c6e9b58-d567-4d96-a289-44fce7e0adf6	it	Oggetto: Anello	\N	\N
3263	2016812a-3bcd-45df-a8c1-b1a1d7660bb5	it	Brand Indie: To Alice	\N	\N
3264	84c1d5c8-7ba8-4f64-8aa1-c2cb95649471	it	Scale	\N	\N
3265	3711838d-d5d0-42ce-a615-31487c6efa27	it	Brand Indie: Lumiebre	\N	\N
3266	1ff3901d-1ece-4e79-b35c-067450b7bb74	it	Cuori	\N	\N
3267	10cb852f-faec-489d-8fae-50023abca73a	it	Candelabri	\N	\N
3268	3010ad34-21c5-4df0-a4a5-cb6e1eee7a07	it	Caramelle	\N	\N
3269	0db54482-a318-47f6-ae2b-84d37c5e0dc3	it	Pattern: Quadretti	\N	\N
3270	3674697a-ae1e-4188-81b4-8dc699894a35	it	Materiale: Resina Acrilica	\N	\N
3271	1635480b-17d9-49a6-9cfd-2c1a39226829	it	Pegaso	\N	\N
3272	858c1323-7299-4414-8efa-b2bd782d3f4f	it	Brand Indie: Pina Sweetcollection	\N	\N
3273	8f8eccac-d7bb-4032-b73c-e851fe381030	it	Contenuto Sensibile	\N	\N
3274	09c8a2c1-36ac-4050-b4f8-9de25dde2114	it	Pattern: Pois	\N	\N
3275	85bfca68-43ba-4b66-89e7-8ef77e524dd7	it	Crostate	\N	\N
3276	86cfb6fc-767e-41ac-9fdb-ce81fc98f104	it	Brand Indie: HMHM	\N	\N
3277	2a01e5a5-36ae-40c6-84fa-7ab4b417269c	it	Brand Indie: Ange	\N	\N
3278	0576b53a-c59f-4682-9b2f-1415b043265b	it	Oggetto: Spilla	\N	\N
3279	164f79f5-d2ec-4f5a-aed1-a0be99a85795	it	Foresta	\N	\N
3280	18e282f2-dc5a-4222-a03d-4320d7863b93	it	Brand Indie: Cloud Chamber	\N	\N
3281	08fb8d3e-ee0a-4312-9923-4dbe9c6dd7cf	it	Brand Indie: R. R. Memorandum	\N	\N
3282	14f4fd24-cf61-454e-95ea-61d9a8d76432	it	Collaborazione	\N	\N
3283	27b9a3b1-46c7-4439-bf86-21f6e7f18f0e	it	Oggetto: Grembiule	\N	\N
3284	11fa9af8-353d-4c30-8b1b-43b477e93d2a	it	Finitura: Scamosciato	\N	\N
3285	37ff5c0e-f635-4e86-9072-8df0176526ec	it	Brand Indie: Pretty/Pretty Scandal	\N	\N
3286	13be8970-32e7-4435-b91f-698abc6b2e1c	it	Pattern: Sfumatura	\N	\N
3287	209fa323-d81f-4a14-862d-b181e2df9411	it	Oggetto: Cuffia	\N	\N
3288	0db4ef1f-effb-4d29-b917-574a470e51b3	it	Indie Coreano	\N	\N
3289	3d25977c-fe58-4e23-95f1-1f0912e5f20e	it	Oroscopo/Astrologia	\N	\N
3290	2af2b193-c7b4-4781-bdf7-d1ef9f5ee194	it	Caroselli	\N	\N
3292	1e21c4ee-a745-4609-ae4d-f716871c3abb	it	Brand Indie: Spica	\N	\N
3293	3cade109-a31e-463c-9e67-c9695d78132e	it	Brand Indie: Carina e Arlequin	\N	\N
3294	078d36ba-7645-4a50-8cbb-47555c4c0300	it	Giocattoli	\N	\N
3295	2fe741d5-7743-407b-bb44-64240ef5fd96	it	Marionette	\N	\N
3296	3af89989-28c4-4e70-a08c-d4d8de2826c7	it	Giardini	\N	\N
3297	1dcd303c-ab56-41c0-a668-5daa73a86460	it	Oggetto: Velo	\N	\N
3298	10e8bc10-e26a-478a-b7f9-263fb286ce3a	it	Panna Montata	\N	\N
3300	3caa67e0-6937-4d53-9417-b7e4c56edca0	it	Brand Indie: Coquette Doll	\N	\N
3302	056db6ae-9eda-403e-8630-0bc09aa58943	it	Pattern: Damasco	\N	\N
3303	2ff33588-c576-4919-b765-8b8022e92f89	it	Brand Indie: SWIMMER	\N	\N
3304	200b47c8-3fb0-4cf4-8bda-f9ceeab03300	it	Fiabe	\N	\N
3306	2ffb943a-efa7-4120-8996-d75818ee3924	it	Brand Indie: Fantastic Wind	\N	\N
3307	13c39cd7-9b84-49c6-b17f-ef8c2f9a9247	it	Pattern: Solido (Solo per OP,JSK e Gonne)	\N	\N
3308	13985661-d18e-469e-a476-e6b1b4b69299	it	Bagni	\N	\N
3309	14f4cf79-1d20-49fb-8d78-937f458dac31	it	Oggetto: Lucky Pack	\N	\N
3310	0c7a09b1-b232-41f2-aca6-da88bc122cff	it	Brand Indie: Algonquins	\N	\N
3311	0ab74d6e-93da-43f4-a61a-2caf29f993a4	it	Designer: Yoh	\N	\N
3312	38990061-0827-45a9-89d3-ef949c89ae50	it	Coppe	\N	\N
3313	85f32a89-7fea-4d07-b60b-dcf53f045578	it	Lettere/Buste	\N	\N
3314	04fd0dcd-e706-4b83-aab5-eb5500deba4a	it	Dettaglio: Applique	\N	\N
3315	204a527a-1b29-4344-8307-188d50b206b4	it	Brand Indie: Kazuko Ogawa	\N	\N
3316	8b6265e5-a2f8-4099-a7d3-2365d89ee879	it	Halloween	\N	\N
3317	29b84e71-56f0-4d95-8edd-948e545847e4	it	Carte da Gioco	\N	\N
3318	05610265-fcde-4efd-89ed-7a413d634420	it	Brand Indie: Mew	\N	\N
3319	3ab7fa9e-0219-4418-84dd-28898c3cda44	it	Motivi Religiosi	\N	\N
3320	190a6975-e382-4ad1-b20a-92c3d60c8007	it	Barboncini	\N	\N
3321	1e88d3eb-7a32-422d-9116-522cff35fdbc	it	Oggetto: Pettine	\N	\N
3322	1ffe0b29-33e8-4ae8-8bef-0f9f1170b381	it	Pattern: Plaid, Tartan	\N	\N
3323	0f393374-49bc-47f1-83aa-496b86f6d242	it	Replica della Stampa	\N	\N
3324	034a7d78-2c42-441a-8eb9-b9eb2a66919e	it	Mobilio	\N	\N
3325	0eec7034-789e-4bba-9199-41457c13dd65	it	Brand Indie: Dear Margaret	\N	\N
3326	25b480f5-48b9-445b-93de-cc2d26e32dbe	it	Suola: Gomma	\N	\N
3327	1b14b999-2f4a-4d3d-9bfa-a536ca339bfa	it	Perline	\N	\N
3328	023e3f85-40ca-4ab0-965f-de2749c8ca29	it	Finitura: Opaca	\N	\N
3329	05ce0cf3-8358-4465-b408-c9e0daab384f	it	Brand Indie: Fairy Wish	\N	\N
3330	1e615461-f8e5-4627-ac8b-c27afe84ea54	it	Materiale: Plastica	\N	\N
3331	01e8acfb-93aa-4836-82c7-09a817c0e526	it	Suola: Schiuma	\N	\N
3332	258fe6f0-9224-4cb9-91f4-8187fc69f0f3	it	Ventagli	\N	\N
3333	2b00ee01-6459-41c6-ab59-6aec76a485ca	it	Ornamenti	\N	\N
3334	89da885e-4487-4e7c-8f0c-e16ea45aebce	it	Brand Indie: Arcadian Deer	\N	\N
3336	04dd7ad4-d36d-4926-8915-1c52704d1c2d	it	Indie Giapponese	\N	\N
3337	01394c41-3bae-4df6-899e-9e9930fe02fd	it	Brand Indie: Seraphim	\N	\N
3338	84faadf0-73a0-4fda-9312-8d8d9a44ff13	it	Disney	\N	\N
3339	07988043-c876-4295-9110-264244c0bc48	it	Brand Indie: Elpress L	\N	\N
3340	8371d116-6102-4855-95c0-75ccd2bafc85	it	Cigni	\N	\N
3341	148491eb-4c1d-4c84-9220-25d7c6a2a6c3	it	Lago dei Cigni	\N	\N
3342	8d0cb50e-2a4b-4636-afac-a9bc1002fc90	it	Creamy Mami	\N	\N
3343	fbb1a252-e442-4e8e-b188-9fa767423d72	it	Sottobrand: PtMY (Putumayo)	\N	\N
3345	e4437025-c44f-40d1-abca-31e7d8aa6261	it	Oggetto: Girocollo	\N	\N
3346	5e0b0018-79a9-4adc-9b1c-e5691ec25bda	it	Brand Indie: Sing a Lullaby for You	\N	\N
3347	e10da7a8-277a-4d9e-80a7-7cab5020c027	it	Motivo: Borse	\N	\N
3348	bc777600-18a9-4ec1-b935-fcdc843d71b5	it	Farfalle	\N	\N
3349	c7299dbe-21cd-4d22-81eb-c86c7d33d43e	it	Brand Indie: Chocomint	\N	\N
3350	f6aa50fc-c64e-46ce-8abf-b9ab47251a89	it	Brand Indie: Magic Potion	\N	\N
3351	b561e47d-a6d7-463c-b723-735b59444001	it	Motivo: Cosmetici	\N	\N
3352	137c117d-f0b5-4057-8507-322a4105f86e	it	Sottobrand: Lapin Agill	\N	\N
3301	82d98b84-7ca4-49d7-b09c-39cbe93707cb	it	Motivo: Gioielli	\N	2026-02-07 02:41:58+00
3353	93444f7a-f41e-43e6-9c31-e04e75a9369c	it	Picche	\N	\N
3354	301d7f4c-081d-4154-b068-161bf0e59973	it	Sottobrand: na-th	\N	\N
3355	dea6fcc5-dfc9-4e93-8016-b1a33ed178cb	it	Tessuto: Burberry	\N	\N
3357	aafdb820-cbef-4f2e-a23c-b263c2b07c8e	it	Indie Cinese	\N	\N
3358	5287901a-111a-49a0-b3dd-a32052a8eef3	it	Rose	\N	\N
3359	6aab9ef6-e7e1-4457-b819-3f0a6fc5a165	it	Orecchie Animali	\N	\N
3360	c807ad8e-86e3-4352-8c46-63303a2c2983	it	Tessuto: Finta Pelliccia	\N	\N
3361	70072323-c877-4251-8ac3-f2d3609d133f	it	Sirene	\N	\N
3362	f025198a-76b9-43d6-9fce-1b0607e490b4	it	Piume	\N	\N
3363	bd461446-f28a-45b4-baa8-79f54639a7a8	it	Suola: Legno	\N	\N
3364	72e592f8-bcc0-4b6f-a36e-c71e97f26c5b	it	Mazzi di Fiori	\N	\N
3365	e013d9b6-7b13-40f4-8e99-fa6a74f6a5d2	it	Brand Indie: Elegy	\N	\N
3366	f8cdc971-1c61-4ac8-a185-2742420a71ff	it	Perle	\N	\N
3367	ce42a0bd-7fe6-4042-9142-33179cca6a3e	it	Corone	\N	\N
3368	963f404f-02ac-4ca7-9a67-d3c354e1aec4	it	Pattern: Strisce Reggimentali	\N	\N
3369	e3c2268f-6977-4aaf-9106-1685bcf4cc16	it	Oggetto: Molletta	\N	\N
3370	21c2f99b-c3a4-4524-9f6c-590444596104	it	Tessuto: Chiffon	\N	\N
3371	5e4dcb60-545e-4191-bd57-24a685552618	it	Pianoforte	\N	\N
3372	b134365f-6cd6-4ea4-8a34-8bd67ac6c31d	it	Tessuto: Pelliccia	\N	\N
3375	959a0135-9d1a-4ed8-aa0f-8326dd261690	it	Designer: Imai Kira	\N	\N
3376	934310c3-51e6-4a34-b6af-ad8543e76421	it	Sottobrand: Aguglieria	\N	\N
3377	724b2379-3daa-4cd2-a7ac-2f2290861d78	it	Tessuto: Organza	\N	\N
3378	0fe23d8f-74bf-46d6-b8d8-26c3a4c24834	it	Tessuto: Denim	\N	\N
3379	a02b26f4-7e97-4416-b6e2-4aa0f1975fb7	it	Spine	\N	\N
3380	c8dfbb9e-aac2-4a7d-94d4-23553d600819	it	Uccelli	\N	\N
3381	3ec8747a-fee5-4ec8-811a-5f5c8f406c61	it	Cibo	\N	\N
3382	ec3d8362-6dfc-4c21-a161-6f3d5fda75fc	it	Coniglio Bianco	\N	\N
3383	fe69cd09-d2c4-4182-a241-cac26f2335e8	it	Regali	\N	\N
3386	98189ad6-9575-4c0f-a0d8-386e7b91fa8a	it	Stelle	\N	\N
3387	9e2ede1e-6847-4bd4-b2b8-2e0fef3acdc8	it	Pattern: Stampa con Animali	\N	\N
3388	7130552e-4b7d-4fb7-b2a6-981a74ac172b	it	Oggetto: Fascia per Capelli	\N	\N
3389	6ea63e4b-12e1-4218-9759-a3a99c31ef32	it	Brand Indie: Kaneko	\N	\N
3390	d88902b0-9164-4595-a15f-ffdce28f8c0f	it	Lune	\N	\N
3391	774c4752-36d5-4bda-a358-de2bdfcd552c	it	Circo	\N	\N
3392	62a1429a-38e1-4cda-b1fd-714c453a6eac	it	Quadri/Cornici	\N	\N
3393	68b435c9-1c3f-41e2-9114-4b2c91a87b9f	it	Brand Indie: Dandy Puppeteer	\N	\N
3394	abf6935b-8032-4e52-9e50-e1189c629512	it	Oggetto: Orecchini	\N	\N
3395	bb2b6a63-aa52-4235-bd8f-21e332d0994e	it	Dettaglio: Lavorato a Maglia	\N	\N
3396	795ec298-b337-4479-8209-1ecfb49bc7a2	it	Brand Indie: Automatic Honey	\N	\N
3398	d12916ca-4ba4-4b37-9e6a-5e4f9527fb5d	it	Pattern: Losanghe	\N	\N
3399	9aad6f2c-a07e-492f-99a0-84151f2f2f53	it	Brand Indie: Little Chili Shop	\N	\N
3400	fa15a4ef-9b01-42d7-b4c4-81c143de8c5f	it	Tessuto: Satin	\N	\N
3401	52331933-6c7a-4623-8ee3-28ab7145231f	it	Indie Russo	\N	\N
3402	fa468a33-4710-42d5-aabb-bb2b56a0bd35	it	Alice nel Paese delle Meraviglie	\N	\N
3403	3dd565c3-73d4-442a-a633-ddc7b7660984	it	Brand Indie: Me Likes Tea	\N	\N
3404	a9126e03-66ea-4b48-9b4e-187526246502	it	Dolciumi	\N	\N
3405	f62d5937-8b6d-4f5e-9fb8-e0f90703d598	it	Brand Indie: Strawberry on the Shortcake	\N	\N
3406	b9a11a81-6e75-4664-bad8-74d7d7350dd9	it	Decorazioni Astratte	\N	\N
3407	aa666862-3dc3-48bc-929c-666ee9889285	it	Sottobrand: Crown Label	\N	\N
3409	b471d546-4626-42f4-9e99-351fcf54595a	it	Pattern: Mimetico	\N	\N
3410	e967aea5-ecc9-4661-ba28-c53ced6eb086	it	Tessuto: Vellutino	\N	\N
3411	b4b7051e-a22e-4012-9c20-1252515004c9	it	Marino	\N	\N
3412	cfa01ebf-44a9-44fc-a914-4f555e17ecd5	it	Sottobrand: MAM	\N	\N
3413	d337f75a-4ca2-4312-b1fd-484179feaf8c	it	Ciambelle	\N	\N
3414	be8b93cd-f53a-44ae-8e58-76c9198ef34a	it	Brand Indie: Magic Tea Party	\N	\N
3415	4778ff65-9521-4f3c-9c79-17f896cf5e4d	it	Tessuto: Pizzo	\N	\N
3416	2c1ab46d-4ab3-41c8-b5d5-afdc4749f622	it	Pattern: Gessato	\N	\N
3417	94d96cf4-bd36-4614-b091-2f7de813aaed	it	Dettaglio: Glitter	\N	\N
3418	5e623ac8-9764-4a79-ac35-5b6408af96f8	it	Brand Indie: Little Dipper	\N	\N
3419	b5834ea3-ae9c-4c73-ad86-5cde023c37ad	it	Floreale	\N	\N
3420	8026e2b8-825f-4cf5-b061-7e9095c2c6fb	it	Tessuto: Jacquard	\N	\N
3421	7172edc2-bdfe-4008-af88-4e495bff82bb	it	Torre Eiffel	\N	\N
3422	a6a4f9ca-0567-4110-a9e0-ed8089e061a9	it	Alloro	\N	\N
3423	9d8d799a-6e93-424b-a0ba-4cd0a8cfb776	it	Bare	\N	\N
3424	fa292233-6a0c-4378-a83b-a67c732f8a85	it	Materiale: Paglia	\N	\N
3425	f33fea20-4c70-40cd-9af9-91819f2134f4	it	Tessuto: Spigato	\N	\N
3426	4f340ddf-e627-4d7f-807e-7a19fbdad7b3	it	Sottobrand: Axes Femme Kids	\N	\N
3427	a80fab5d-74c9-4731-89b5-1e7450b64324	it	Brand Indie: Visible	\N	\N
3428	9d6dd0a2-4895-441b-a15f-6d46f79948dd	it	Conigli	\N	\N
3429	45db235f-2761-4755-9cd8-ea632b1f79ce	it	Pizzo	\N	\N
3430	d2e25328-0a2c-414f-93a3-2ffa9ac1875e	it	Oggetto: Cappello	\N	\N
3431	713a3325-daa6-4193-adb2-0e2d54271ee8	it	Cappuccetto Rosso	\N	\N
3432	558f4b51-2094-47f0-a558-4415fbc79264	it	Oggetto: Polsini	\N	\N
3433	fb3bf2f7-f2b0-4281-9659-752ee8e35495	it	Navi	\N	\N
3434	6d991b39-5b78-42f9-9490-3188b2e3d26e	it	Motivo: Scarpe	\N	\N
3435	97726e25-dd5e-4dff-a852-4f599497db61	it	Violette	\N	\N
3436	5e4e4472-c68d-4681-b023-cb14c217c9f2	it	Pattern: Tela	\N	\N
3437	d36d042c-8884-4c22-afe1-6dcbc1095d4a	it	Brand Indie: Schwarz Schmetterling	\N	\N
3438	70c0964e-2f5c-4b79-9dea-b36fde2ceea1	it	Scrittura	\N	\N
3439	d806236c-3854-46bc-a474-7ac99aeb8a61	it	Strumenti	\N	\N
3440	ee207d84-d31c-41fd-8f2a-d969aa561124	it	Croci	\N	\N
3441	b9e47d6a-a543-4d2c-9f2a-92e35d483c1f	it	Tessuto: Tela	\N	\N
3442	60667b47-f661-4db0-ab56-74becad8d567	it	Pattern: Strisce	\N	\N
3444	7a04cf8a-3901-40a7-ad0d-182bf348cfbe	it	Brand Indie: Strawberry Witch	\N	\N
3445	4df05feb-9688-4c7b-9974-0d40ac2bfc15	it	Pattern: Pied de poule	\N	\N
3446	72b53869-f3da-4f88-8126-056df30e1057	it	Nappe	\N	\N
3447	6af0c4fc-f05a-46ad-823c-8a0f37081084	it	Tessuto: Tulle	\N	\N
3448	98814024-ac97-47a9-8b19-9feb14cd05ee	it	Brand Indie: Long Ears Sharp Ears	\N	\N
3449	4d56a435-3e90-4bfc-aeed-ec9bbf7ca9e4	it	Chiese/Cattedrali	\N	\N
3450	fbc9d213-e837-4c45-9ebc-1d9cc334a398	it	Vetrate	\N	\N
3451	6e6620da-bc81-416c-bae1-955a3974979d	it	Brand Indie: White Moon	\N	\N
3452	f4fd2742-16a4-4fef-827d-ec57fd313c3c	it	Oggetto: Guanti	\N	\N
3453	b3d0457b-ba5b-495a-8f26-afae76e9c7e8	it	Ancore	\N	\N
3455	acc3d253-4b8e-4003-9f6d-fed28e884c6d	it	Sottobrand: Axes Femme Kawaii	\N	\N
3456	a4be4a43-fc8e-4ceb-ad54-d18e819a1f4d	it	Lampade (non Candelabri)	\N	\N
3457	f27862e1-7cfd-452d-9df9-2082990a74dd	it	Sanrio	\N	\N
3458	40f72ec4-3f0d-42c0-8a4c-040956229cbb	it	Suola: Sughero	\N	\N
3459	c58a7438-185a-4164-b604-22333329b6a9	it	Motivo: Fiocchi/Nastri	\N	\N
3460	568a7b2e-30ac-4fd6-8746-f5b6a586c026	it	Brand Indie: Classical Puppets	\N	\N
3461	d5fb88f6-8ee0-4719-9682-911f1aa1e9c2	it	Dettaglio: Pompom	\N	\N
3462	d275af53-605d-4f78-8c23-cc9b88a44fea	it	Dettaglio: Ricamo	\N	\N
3463	54f6e0dd-bc60-4e25-bacc-4a1bbd3b87d1	it	Tesori	\N	\N
3464	5b55d2ef-d295-41b2-bcd8-cba97003a7c1	it	Indie Occidentale	\N	\N
3465	9430230c-f046-435a-bf03-732773251928	it	Cammeo	\N	\N
3466	5d13dd7f-5301-4338-855a-8e090d79a943	it	Arte	\N	\N
3443	f965ffb7-74d5-4fd8-ac5b-7180404248c1	it	Brand Indie: Classic Lolita	\N	2025-05-12 19:09:32+00
3385	adf4de04-f73d-4e59-884b-54b0661a7f01	it	Dettaglio: Strass/Gioielli	\N	2026-02-07 02:45:55+00
3467	6a9d0dcb-d98d-4787-9dfa-f1ddf95e86c5	it	Cioccolato	\N	\N
3468	a85026f7-a04f-40fd-a578-95bd475e539f	it	Cupcake/Muffin	\N	\N
3469	a2fbc8ea-5831-4fe1-921a-c15230a87683	it	Teatro	\N	\N
3470	dceb49ec-f180-412c-9669-57b686fe7759	it	Brand Indie: Cherie Cerise	\N	\N
3472	d5869c48-5d65-43ea-8c73-179745cb6172	it	Oggetto: Collana	\N	\N
3473	58347588-7557-4c33-b879-4381ec107ee9	it	Brand Indie: Larmes de Angel	\N	\N
3474	9b15d05a-acab-49e8-9eb6-1388c47bb6bf	it	Colorazioni Incomplete	\N	\N
3475	f3d6dae7-fa1f-4652-ac96-e41604e9819a	it	Cavalli/Pony	\N	\N
3476	e1448e60-ce4d-4291-83e7-65c8b154e7e3	it	Architettura	\N	\N
3477	61aff707-1ec0-402d-a382-04db8d1e7408	it	Tessuto: Lana	\N	\N
3478	84f19366-1076-4cbb-ae26-b30dd6f893e6	it	Gloomy Bear	\N	\N
3479	b0aa776c-eda7-482f-8d48-2da2db150e3d	it	Gabbie per Uccelli	\N	\N
3480	b26835ea-c268-47b4-801b-0171ef111da2	it	Catene	\N	\N
3481	d2f05649-7adc-40b4-a20e-3dd71f99e1ee	it	Est Asiatico	\N	\N
3482	ceab0b21-0aef-4908-bfe6-8dba6a63999a	it	Posate	\N	\N
3483	f019c054-1904-49d7-ae4e-332bd2946ccc	it	Brand Indie: Fanplusfriend	\N	\N
3484	6c8c228f-24f0-4cb5-a6b3-3f7aec1915eb	it	Sottobrand: Mille Noirs	\N	\N
3485	189fcdc1-067e-4c8f-9a2c-e83e35236849	it	Sottobrand: Shotgun Wedding	\N	\N
3486	0cb1a194-e0dc-43a9-a73f-d60d44ddea81	it	Sottobrand: Axes Femme Poetique	\N	\N
3487	fee03109-8754-4a33-879d-2cd7d8b2f9e6	it	Brand Indie: Miss Point	\N	\N
3488	e26cea64-2b6f-4a67-bb06-08177a6db0a9	it	Chiavi (Non di Pianoforte)	\N	\N
3489	cd1f0d47-08f4-4a32-9273-1ef117aaecf4	it	Desserts	\N	\N
3490	77a18fde-ee4c-4ebd-a84d-9cab54f69526	it	Motivo: Cappelli	\N	\N
3491	46934c25-bdae-4472-b1ab-c6d170d9487a	it	Brand Indie: GRAMM	\N	\N
3492	0c742330-c88e-41da-ad2f-4a8c260f57dd	it	Cancelli	\N	\N
3493	71f32f96-2573-4ca5-bed5-9f89f67d6810	it	Brand Indie: We're All Mad Here	\N	\N
3494	a136fdf2-702e-427e-b5cb-5096a5a26cad	it	Designer: Novala Takemoto	\N	\N
3495	ff5b6c81-5d78-4306-a554-799fa02744f7	it	Cervi/Daini/Bambi	\N	\N
3496	42ea103a-ec7e-4fc9-8e94-cca96fc652df	it	Stile: Cameriera	\N	\N
3497	7d32c077-4354-45c4-bce1-b98a7dbf892f	it	Brand Indie: R Series	\N	\N
3499	9dbf01d4-ebab-4ba2-916b-37cd9b13ad43	it	Animali	\N	\N
3500	84238c3f-1388-4c4c-b3cb-f5dc47b9ad04	it	Filastrocche	\N	\N
3501	c1b52295-d1ed-4293-9980-05caf47d6749	it	Brand Indie: Eat Me Ink Me	\N	\N
3502	9eccd854-74a2-42e3-bd3f-f721b1436e81	it	Tessuto: Velluto a Coste	\N	\N
3504	ea72fb7f-f55f-410a-a659-580d731b59af	it	Dettaglio: Fiocchi	\N	\N
3505	cc925d7c-707f-4d34-8a2f-dcca88622ea9	it	Biscotti	\N	\N
3506	5b36abc1-61d0-4153-b7f3-8f91936897c1	it	Replica	\N	\N
3507	e7e024ca-72b0-46c2-afe0-796c2d300069	it	Tessuto: Lino da Macellaio	\N	\N
3508	c4fa69cf-002a-48a9-8ee9-bf1869fe4e34	it	Pattern: Scacchi	\N	\N
3509	9a4d8906-98fa-4a8e-91be-f011d7134b71	it	Oggetto: Scrunchie/Elastico per Capelli	\N	\N
3510	7b3dd3ff-198c-4e06-a9fc-483eb8a7f650	it	Brand Indie: Lethe's Castle	\N	\N
3511	4931a57b-e5df-4463-8d9c-f393f696e173	it	Ingranaggi	\N	\N
3512	d3a21074-e48d-4443-acd5-e11cfbafdf96	it	Gatti	\N	\N
3513	ac069808-12bd-4339-bd18-0a944d73da9d	it	Oggetto: Braccialetto	\N	\N
3515	9cbb71a1-a868-4fbe-a7e1-24feaa2b9512	it	Brand Indie: Boguta	\N	\N
3516	a54ffece-5faa-46c9-a1af-9a62db5fb735	it	Brand Indie: The Snow Field	\N	\N
3517	f4292a67-e8e6-4c5a-83d8-5ad559761713	it	Tè	\N	\N
3518	de414a89-16df-4cb6-aca2-fc795415d8bc	it	Tessuto: Shantung	\N	\N
3519	cc84e20d-75cd-4b81-87ee-c08d9b5c3ff8	it	Bastoni	\N	\N
3520	62e4ee22-e10a-470a-bb79-2294c85dcebe	it	Brand Indie: Marchenmerry	\N	\N
3521	f3d80995-3dd3-460d-ad39-1a042c7e82d5	it	Stile: Marinaro	\N	\N
3522	984ef551-6a4d-4602-8c44-5e4ffd17b329	it	Regale	\N	\N
3523	9d679cea-1dc6-43ab-84db-4308ab88bf69	it	Pattern: Pizzo Stampato	\N	\N
3524	aeb340c7-31ea-4f9c-8932-7c5cf67daae0	it	Brand Indie: A+Lidel	\N	\N
3525	dc0a8b4b-083a-468a-b01d-7196e43a1139	it	Il Fantasma dell'Opera	\N	\N
3526	3d584723-b691-4fa5-9689-ece285f61468	it	Brand Indie: Diamond Honey	\N	\N
3527	90298b53-5960-4b91-9571-7ff0545a5ba4	it	Oggetto: Cappello di Paglia	\N	\N
3528	94fb064a-25cc-4169-b768-a3aa8456382d	it	Sottobrand: Axes Femme Nostalgie	\N	\N
3529	c804f702-8b58-42d0-a7a9-89e8f8780e2b	it	Stile: Infermiera	\N	\N
3530	a9c2cbbf-f0a9-4f18-a5e8-021c6af29866	it	Oggetto: Gilet	\N	\N
3531	ad686d33-8cda-4b38-b381-7a922aa35a30	it	Brand Indie: TourNewSoul	\N	\N
3532	d4f0390a-595c-4870-aa7a-feee080d4a85	it	Diamanti	\N	\N
3533	d3ec78f2-7115-4b5b-9bf4-d0e88d1816b8	it	Brand Indie: abilletage	\N	\N
3534	657bdb91-7157-4242-81eb-928f7a2d333b	it	Brand Indie: Baroque	\N	\N
3535	42a02dcc-7aba-4db3-96f8-f63dcb3fb25f	it	La Sirenetta	\N	\N
3536	48c1912d-7660-4c32-8033-85e690d86417	it	Fate	\N	\N
3537	7c0a6ccf-56ae-4fcc-b299-c9073d4620b6	it	Brand Indie: Rose Trianon	\N	\N
3538	5ceb8a7f-7d98-4197-ad07-1a4edaee6e7a	it	Blasoni	\N	\N
3539	b0896a36-cf23-497a-881a-9911b37e37be	it	Brand Indie: Lusty'n Wonderland	\N	\N
3540	5cfcf9e5-a425-4541-9587-ab532506f644	it	Macarons	\N	\N
3541	75f5b041-0f50-4f36-ba88-75e53255b8fa	it	Frutta	\N	\N
3542	6e8844be-b360-49bf-81ed-1284f82ae109	it	Ciliegie	\N	\N
3543	7e4be614-7dff-4582-be52-90baacdc54a6	it	Oggetto Richiamato	\N	\N
3544	2b129174-161e-4919-a986-8b21485da293	it	Sottobrand: Dark Box	\N	\N
3545	275193d3-b21e-4562-a8be-3ef2af28975a	it	Sottobrand: Vallee Lys	\N	\N
3546	fcbd1189-918a-41d2-9e96-761b4bd4de0f	it	Edifici	\N	\N
3547	9a50e334-7852-4e30-9aea-5fe677cf205b	it	Dettaglio: Floccato	\N	\N
3548	79a5d8b7-83ec-452e-b86b-de09b28af4ba	it	Castelli	\N	\N
3549	2535508b-c990-4666-a7b3-da6f85829566	it	Giglio	\N	\N
3550	95b48c4b-d6d2-4208-9247-8e61adf39a85	it	Brand Indie: Pumpkin Cat	\N	\N
3551	adb47b96-96d6-4d16-bafa-49efac3108cd	it	Brand Indie: Morun x Muuna Stoik	\N	\N
3552	7a2f96ca-d48e-4b6c-bc29-15a42d1154a1	it	Parziale (informazioni Incomplete)	\N	\N
3553	9bca6dec-3592-480f-b1c2-7e9ef90d2dd3	it	Fragole	\N	\N
3554	81bd4871-5340-4eb0-9467-c2b03d265288	it	Tessuto: Tessuto Spesso	\N	\N
3555	b25a08b2-8abb-4d3c-837c-6f651735b0aa	it	Motivo: Vestiti e Scarpe	\N	\N
3556	ab69d91c-67f6-469f-967e-4ce21f5ae939	it	Orologi da Taschino	\N	\N
3557	247fe0c3-96a4-45cf-ab9b-b72e74a786d0	it	Semi di Carte	\N	\N
3558	a244589a-1a2d-4977-86b3-c163600d05d7	it	Carrozze	\N	\N
3559	20d3f0f3-a98c-45d7-a2c8-adb29ae4df83	it	Tessuto: Pelle Sintetica	\N	\N
3560	c5f94629-0062-4ffb-84db-a88cb5009494	it	Brand Indie: Vierge Vampur	\N	\N
3561	61f8be95-829a-44ab-a146-58d750e77d47	it	Tessuto: Crêpe Cinese	\N	\N
3562	cae850b4-811f-4c21-9d87-222c3d7fb80f	it	Note Musicali	\N	\N
3563	f824cf09-ccc4-4d13-8f56-ec51c32572f1	it	Brand Indie: Marchen die Prinzessin	\N	\N
3564	7012ef73-54a3-495f-9751-7801766b4841	it	Brand Indie: Dolly House	\N	\N
3565	cfe1fb80-23b2-4238-8125-3b9bbb6de577	it	Oggetto: Clip per Scarpe	\N	\N
3566	c738f3a4-ac46-4b9e-b4f9-89501fdd269f	it	Dettaglio: Passamano a Zig Zag	\N	\N
3567	9e86b439-c4f5-495a-8b7f-954af61d13db	it	Orsi	\N	\N
3568	a1e8f6d6-8256-4272-a43f-6007f7fbd604	it	Tessuto: Pelle	\N	\N
3569	f32b774a-d0c1-475e-8c9c-17a2e5f3fdae	it	Unicorni	\N	\N
3570	548c1595-aa23-40b4-b7db-5663a1cdb58f	it	Brand Indie: Moonrise Theater	\N	\N
3571	8e43623d-26fe-4dc2-ba13-ff0200b0fb98	it	Tessuto: Gobelin	\N	\N
3573	5ffe3a83-30e8-44aa-b161-539625659856	it	Brand Indie: Mystery Garden	\N	\N
3574	759fb641-c6ab-4dee-80c1-0557b9676d4b	it	Oggetto: Scaldamani	\N	\N
3575	380171a6-7296-4678-ad44-ab8cc589c6fc	it	Sottobrand: MA	\N	\N
3977	87234031-8018-4d09-818a-3de6ee375db2	en	Ghosts	2023-11-18 00:39:58+00	2023-11-18 00:39:58+00
3503	df668af3-5c82-4a25-8076-bd053d8798cd	it	Motivo: Ombrelli	\N	2026-01-04 03:38:03+00
3989	cd8b3cab-6130-41c5-aab4-4f99f9ee6051	en	Children's Sizing	2024-01-03 03:49:05+00	2024-01-03 03:49:05+00
3991	26dc810d-97a6-431e-bdd1-bdb3a7c5b412	en	Indie Brand: Hoshibako Works	2024-02-14 01:47:15+00	2024-02-14 01:47:15+00
3993	26dc810d-97a6-431e-bdd1-bdb3a7c5b412	fr	Marque Indépendante : Hoshibako Works	2024-02-14 01:48:08+00	2024-02-14 01:48:08+00
3994	26dc810d-97a6-431e-bdd1-bdb3a7c5b412	it	Brand Indie: Hoshibako Works	2024-02-14 01:48:08+00	2024-02-14 01:48:08+00
3995	26dc810d-97a6-431e-bdd1-bdb3a7c5b412	nl	Indie Brand: Hoshibako Works	2024-02-14 01:48:09+00	2024-02-14 01:48:09+00
3996	4316697a-c64d-4c3b-8585-37891871d2f5	en	Indie Brand: Fluffy Tori	2024-02-14 02:18:49+00	2024-02-14 02:18:49+00
3998	4316697a-c64d-4c3b-8585-37891871d2f5	fr	Marque Indépendante : Fluffy Tori	2024-02-14 02:18:49+00	2024-02-14 02:18:49+00
3999	4316697a-c64d-4c3b-8585-37891871d2f5	it	Brand Indie: Fluffy Tori	2024-02-14 02:18:49+00	2024-02-14 02:18:49+00
4000	4316697a-c64d-4c3b-8585-37891871d2f5	nb_NO	Indie Brand: Fluffy Tori	2024-02-14 02:18:49+00	2024-02-14 02:18:49+00
4001	4316697a-c64d-4c3b-8585-37891871d2f5	nl	Indie Brand: Fluffy Tori	2024-02-14 02:18:49+00	2024-02-14 02:18:49+00
4002	1b536a4d-b987-47ef-8610-78df5691bffe	en	Indie Brand: WaxPoeticShop	2024-02-14 02:40:10+00	2024-02-14 02:40:10+00
4004	1b536a4d-b987-47ef-8610-78df5691bffe	fr	Marque Indépendante : WaxPoeticShop	2024-02-14 02:41:26+00	2024-02-14 02:41:26+00
4005	1b536a4d-b987-47ef-8610-78df5691bffe	it	Brand Indie: WaxPoeticShop	2024-02-14 02:41:26+00	2024-02-14 02:41:26+00
4006	1b536a4d-b987-47ef-8610-78df5691bffe	nb_NO	Indie Brand: WaxPoeticShop	2024-02-14 02:41:26+00	2024-02-14 02:41:26+00
4007	1b536a4d-b987-47ef-8610-78df5691bffe	nl	Indie Brand: WaxPoeticShop	2024-02-14 02:41:26+00	2024-02-14 02:41:26+00
4008	fd612943-4e36-4a04-9bbf-8fe7d2f9ba03	en	Indie Brand: Cute.Q	2024-02-14 02:57:44+00	2024-02-14 02:57:44+00
4010	fd612943-4e36-4a04-9bbf-8fe7d2f9ba03	fr	Marque Indépendante : Cute.Q	2024-02-14 02:57:44+00	2024-02-14 02:57:44+00
4011	fd612943-4e36-4a04-9bbf-8fe7d2f9ba03	it	Brand Indie: Cute.Q	2024-02-14 02:57:44+00	2024-02-14 02:57:44+00
4012	fd612943-4e36-4a04-9bbf-8fe7d2f9ba03	nb_NO	Indie Brand: Cute.Q	2024-02-14 02:57:44+00	2024-02-14 02:57:44+00
4013	fd612943-4e36-4a04-9bbf-8fe7d2f9ba03	nl	Indie Brand: Cute.Q	2024-02-14 02:57:44+00	2024-02-14 02:57:44+00
4014	6e026bac-84e1-4f19-9bcc-c4efb3f3750c	en	Indie Brand: Summer Tales Boutique	2024-02-23 00:22:10+00	2024-02-23 00:22:10+00
4016	6e026bac-84e1-4f19-9bcc-c4efb3f3750c	fr	Marque Indépendante : Summer Tales Boutique	2024-02-23 00:22:10+00	2024-02-23 00:22:10+00
4017	6e026bac-84e1-4f19-9bcc-c4efb3f3750c	it	Brand Indie: Summer Tales Boutique	2024-02-23 00:22:10+00	2024-02-23 00:22:10+00
4018	6e026bac-84e1-4f19-9bcc-c4efb3f3750c	nb_NO	Indie Brand: Summer Tales Boutique	2024-02-23 00:22:10+00	2024-02-23 00:22:10+00
4019	6e026bac-84e1-4f19-9bcc-c4efb3f3750c	nl	Indie Brand: Summer Tales Boutique	2024-02-23 00:22:10+00	2024-02-23 00:22:10+00
4020	c218caa0-5851-48e9-9118-8977487f8288	en	Indie Brand: L'Esprit de la Noblesse	2024-03-13 04:19:59+00	2024-03-13 04:19:59+00
4021	c218caa0-5851-48e9-9118-8977487f8288	fr	Marque Indépendante : L'Esprit de la Noblesse	2024-03-13 04:19:59+00	2024-03-13 04:19:59+00
4022	c218caa0-5851-48e9-9118-8977487f8288	it	Brand Indie: L'Esprit de la Noblesse	2024-03-13 04:19:59+00	2024-03-13 04:19:59+00
4023	c218caa0-5851-48e9-9118-8977487f8288	nl	Indie Brand: L'Esprit de la Noblesse	2024-03-13 04:19:59+00	2024-03-13 04:19:59+00
4024	c218caa0-5851-48e9-9118-8977487f8288	nb_NO	Indie Brand: L'Esprit de la Noblesse	2024-03-13 04:19:59+00	2024-03-13 04:19:59+00
4025	81e1a53c-4fab-4854-8290-f3e8c4b2c33b	en	Sub-Line: marcHenTica	2024-03-14 00:36:01+00	2024-03-14 00:36:01+00
4026	81e1a53c-4fab-4854-8290-f3e8c4b2c33b	fr	Sous-marque : marcHenTica	2024-03-14 00:36:01+00	2024-03-14 00:36:01+00
4027	81e1a53c-4fab-4854-8290-f3e8c4b2c33b	it	Sottobrand: marcHenTica	2024-03-14 00:36:01+00	2024-03-14 00:36:01+00
4028	81e1a53c-4fab-4854-8290-f3e8c4b2c33b	nb_NO	Sub-Line: marcHenTica	2024-03-14 00:36:01+00	2024-03-14 00:36:01+00
4029	81e1a53c-4fab-4854-8290-f3e8c4b2c33b	nl	Submerk: marcHenTica	2024-03-14 00:36:01+00	2024-03-14 00:36:01+00
4030	352b51a1-651a-43e2-bd28-35ad1fed1f68	en	Sub-Line: marcHenromanTica	2024-03-14 00:38:18+00	2024-03-14 00:38:18+00
4031	352b51a1-651a-43e2-bd28-35ad1fed1f68	fr	Sous-marque : marcHenromanTica	2024-03-14 00:38:18+00	2024-03-14 00:38:18+00
4032	352b51a1-651a-43e2-bd28-35ad1fed1f68	it	Sottobrand: marcHenromanTica	2024-03-14 00:38:18+00	2024-03-14 00:38:18+00
4033	352b51a1-651a-43e2-bd28-35ad1fed1f68	nb_NO	Sub-Line: marcHenromanTica	2024-03-14 00:38:18+00	2024-03-14 00:38:18+00
4034	352b51a1-651a-43e2-bd28-35ad1fed1f68	nl	Submerk: marcHenromanTica	2024-03-14 00:38:18+00	2024-03-14 00:38:18+00
4038	c55ea9c4-af59-471b-89fc-fc6fa9b472e3	en	Indie Brand: BeholderFashions	2024-09-03 21:05:03+00	2024-09-03 21:05:03+00
4039	c55ea9c4-af59-471b-89fc-fc6fa9b472e3	fr	Indie Brand: BeholderFashions	2024-09-03 21:05:03+00	2024-09-03 21:05:03+00
4040	c55ea9c4-af59-471b-89fc-fc6fa9b472e3	it	Indie Brand: BeholderFashions	2024-09-03 21:05:03+00	2024-09-03 21:05:03+00
4041	c55ea9c4-af59-471b-89fc-fc6fa9b472e3	nb_NO	Indie Brand: BeholderFashions	2024-09-03 21:05:03+00	2024-09-03 21:05:03+00
4042	c55ea9c4-af59-471b-89fc-fc6fa9b472e3	nl	Indie Brand: BeholderFashions	2024-09-03 21:05:03+00	2024-09-03 21:05:03+00
4043	31cc021b-dd68-4263-a19a-b9ffc992d7d5	en	Indie Brand: Milianda	2024-09-03 21:06:38+00	2024-09-03 21:06:38+00
4044	31cc021b-dd68-4263-a19a-b9ffc992d7d5	fr	Indie Brand: Milianda	2024-09-03 21:06:38+00	2024-09-03 21:06:38+00
4045	31cc021b-dd68-4263-a19a-b9ffc992d7d5	it	Indie Brand: Milianda	2024-09-03 21:06:38+00	2024-09-03 21:06:38+00
4046	31cc021b-dd68-4263-a19a-b9ffc992d7d5	nb_NO	Indie Brand: Milianda	2024-09-03 21:06:38+00	2024-09-03 21:06:38+00
4047	31cc021b-dd68-4263-a19a-b9ffc992d7d5	nl	Indie Brand: Milianda	2024-09-03 21:06:38+00	2024-09-03 21:06:38+00
4048	4126da1a-cb4b-43f5-8e03-5b6abb832fe0	en	Indie Brand: PureWing	2024-09-03 21:14:01+00	2024-09-03 21:14:01+00
4049	4126da1a-cb4b-43f5-8e03-5b6abb832fe0	fr	Indie Brand: PureWing	2024-09-03 21:14:01+00	2024-09-03 21:14:01+00
4050	4126da1a-cb4b-43f5-8e03-5b6abb832fe0	it	Indie Brand: PureWing	2024-09-03 21:14:01+00	2024-09-03 21:14:01+00
4051	4126da1a-cb4b-43f5-8e03-5b6abb832fe0	nb_NO	Indie Brand: PureWing	2024-09-03 21:14:01+00	2024-09-03 21:14:01+00
4052	4126da1a-cb4b-43f5-8e03-5b6abb832fe0	nl	Indie Brand: PureWing	2024-09-03 21:14:01+00	2024-09-03 21:14:01+00
4053	785f5fd2-925d-43db-9a36-2f11e91aae0f	en	Indie Brand: KuMa	2024-09-03 21:19:07+00	2024-09-03 21:19:07+00
4054	785f5fd2-925d-43db-9a36-2f11e91aae0f	fr	Indie Brand: KuMa	2024-09-03 21:19:07+00	2024-09-03 21:19:07+00
4055	785f5fd2-925d-43db-9a36-2f11e91aae0f	it	Indie Brand: KuMa	2024-09-03 21:19:07+00	2024-09-03 21:19:07+00
4056	785f5fd2-925d-43db-9a36-2f11e91aae0f	nb_NO	Indie Brand: KuMa	2024-09-03 21:19:07+00	2024-09-03 21:19:07+00
4057	785f5fd2-925d-43db-9a36-2f11e91aae0f	nl	Indie Brand: KuMa	2024-09-03 21:19:07+00	2024-09-03 21:19:07+00
4058	b6c0c4a2-1a04-4a80-8201-57a719648ef9	en	Indie Brand: Dusk Prophecy / Sibyl Heisei	2024-12-01 05:38:06+00	2024-12-01 05:38:06+00
4059	b6c0c4a2-1a04-4a80-8201-57a719648ef9	fr	Marque Indépendante : Dusk Prophecy / Sibyl Heisei	2024-12-01 05:38:06+00	2024-12-01 05:38:06+00
4060	b6c0c4a2-1a04-4a80-8201-57a719648ef9	it	Brand Indie: Dusk Prophecy / Sibyl Heisei	2024-12-01 05:38:06+00	2024-12-01 05:38:06+00
4061	b6c0c4a2-1a04-4a80-8201-57a719648ef9	nb_NO	Indie Brand: Dusk Prophecy / Sibyl Heisei	2024-12-01 05:38:06+00	2024-12-01 05:38:06+00
4062	b6c0c4a2-1a04-4a80-8201-57a719648ef9	nl	Indie Brand: Dusk Prophecy / Sibyl Heisei	2024-12-01 05:38:06+00	2024-12-01 05:38:06+00
4063	c345cfbe-e4e2-4572-b27f-260849a3fce3	en	Indie Brand: Zazou Planet	2024-12-02 20:11:01+00	2024-12-02 20:11:01+00
4064	c345cfbe-e4e2-4572-b27f-260849a3fce3	fr	Marque Indépendante : Zazou Planet	2024-12-02 20:11:01+00	2024-12-02 20:11:01+00
4065	c345cfbe-e4e2-4572-b27f-260849a3fce3	it	Brand Indie: Zazou Planet	2024-12-02 20:11:01+00	2024-12-02 20:11:01+00
4066	c345cfbe-e4e2-4572-b27f-260849a3fce3	nl	Indie Brand: Zazou Planet	2024-12-02 20:11:01+00	2024-12-02 20:11:01+00
4067	c345cfbe-e4e2-4572-b27f-260849a3fce3	nb_NO	Indie Brand: Zazou Planet	2024-12-02 20:11:01+00	2024-12-02 20:11:01+00
4068	3fef6b7f-4fe8-4b0f-ac77-8f5173c21c18	en	Indie Brand: Cotton Candy Fantasy	2025-01-05 05:32:35+00	2025-01-05 05:32:35+00
4069	3fef6b7f-4fe8-4b0f-ac77-8f5173c21c18	fr	Marque Indépendante : Cotton Candy Fantasy	2025-01-05 05:32:35+00	2025-01-05 05:32:35+00
4070	3fef6b7f-4fe8-4b0f-ac77-8f5173c21c18	it	Brand Indie: Cotton Candy Fantasy	2025-01-05 05:32:35+00	2025-01-05 05:32:35+00
4071	3fef6b7f-4fe8-4b0f-ac77-8f5173c21c18	nb_NO	Indie Brand: Cotton Candy Fantasy	2025-01-05 05:32:35+00	2025-01-05 05:32:35+00
4072	3fef6b7f-4fe8-4b0f-ac77-8f5173c21c18	nl	Indie Brand: Cotton Candy Fantasy	2025-01-05 05:32:35+00	2025-01-05 05:32:35+00
4073	fbf7d2a8-eedb-4cac-9b2a-0b1255b5f184	en	Sub-Line: lettre de @m	2025-01-05 05:36:50+00	2025-01-05 05:36:50+00
4074	fbf7d2a8-eedb-4cac-9b2a-0b1255b5f184	nl	Submerk: lettre de @m	2025-01-05 05:36:50+00	2025-01-05 05:36:50+00
4075	fbf7d2a8-eedb-4cac-9b2a-0b1255b5f184	nb_NO	Sub-Line: lettre de @m	2025-01-05 05:36:50+00	2025-01-05 05:36:50+00
4076	fbf7d2a8-eedb-4cac-9b2a-0b1255b5f184	it	Sottobrand: lettre de @m	2025-01-05 05:36:50+00	2025-01-05 05:36:50+00
4077	fbf7d2a8-eedb-4cac-9b2a-0b1255b5f184	fr	Sous-marque : lettre de @m	2025-01-05 05:36:50+00	2025-01-05 05:36:50+00
4078	ca6a1a86-54c1-4bdd-90de-e26ce14e3c93	en	Insects / Bugs	2025-02-25 14:49:53+00	2025-02-25 14:49:53+00
4079	ca6a1a86-54c1-4bdd-90de-e26ce14e3c93	fr	Insectes	2025-02-25 14:49:53+00	2025-02-25 14:49:53+00
4080	ca6a1a86-54c1-4bdd-90de-e26ce14e3c93	it	Insetti	2025-02-25 14:49:53+00	2025-02-25 14:49:53+00
4081	ca6a1a86-54c1-4bdd-90de-e26ce14e3c93	nb_NO	Insekter	2025-02-25 14:49:53+00	2025-02-25 14:49:53+00
4082	ca6a1a86-54c1-4bdd-90de-e26ce14e3c93	nl	Insecten	2025-02-25 14:49:53+00	2025-02-25 14:49:53+00
1993	f965ffb7-74d5-4fd8-ac5b-7180404248c1	nl	Indie Brand: Classic Lolita	\N	2025-05-12 19:09:32+00
4083	ec4e2563-6ffd-40c6-98d6-ee5556738b07	en	Indie Brand: Miss Danger	2025-05-28 03:10:42+00	2025-05-28 03:10:42+00
4084	ec4e2563-6ffd-40c6-98d6-ee5556738b07	fr	Marque Indépendante : Miss Danger	2025-05-28 03:10:42+00	2025-05-28 03:10:42+00
4085	ec4e2563-6ffd-40c6-98d6-ee5556738b07	it	Brand Indie: Miss Danger	2025-05-28 03:10:42+00	2025-05-28 03:10:42+00
4086	ec4e2563-6ffd-40c6-98d6-ee5556738b07	nb_NO	Indie Brand: Miss Danger	2025-05-28 03:10:42+00	2025-05-28 03:10:42+00
4087	ec4e2563-6ffd-40c6-98d6-ee5556738b07	nl	Indie Brand: Miss Danger	2025-05-28 03:10:42+00	2025-05-28 03:10:42+00
4088	45c6c91b-208b-4177-b95b-856ee3c20113	en	Indie Brand: Little Rose Planet	2025-05-28 03:13:46+00	2025-05-28 03:13:46+00
4089	45c6c91b-208b-4177-b95b-856ee3c20113	fr	Marque Indépendante : Little Rose Planet	2025-05-28 03:13:46+00	2025-05-28 03:13:46+00
4090	45c6c91b-208b-4177-b95b-856ee3c20113	it	Brand Indie: Little Rose Planet	2025-05-28 03:13:46+00	2025-05-28 03:13:46+00
4091	45c6c91b-208b-4177-b95b-856ee3c20113	nb_NO	Indie Brand: Little Rose Planet	2025-05-28 03:13:46+00	2025-05-28 03:13:46+00
4092	45c6c91b-208b-4177-b95b-856ee3c20113	nl	Indie Brand: Little Rose Planet	2025-05-28 03:13:46+00	2025-05-28 03:13:46+00
4097	1e7663c4-11f8-4a1e-9170-d545a9577ab2	en	Indie Brand: Mossbadger	2025-07-21 04:54:34+00	2025-07-21 04:54:34+00
4098	1e7663c4-11f8-4a1e-9170-d545a9577ab2	fr	Marque Indépendante : Mossbadger	2025-07-21 04:54:34+00	2025-07-21 04:54:34+00
4099	1e7663c4-11f8-4a1e-9170-d545a9577ab2	it	Brand Indie: Mossbadger	2025-07-21 04:54:34+00	2025-07-21 04:54:34+00
4100	1e7663c4-11f8-4a1e-9170-d545a9577ab2	nb_NO	Indie Brand: Mossbadger	2025-07-21 04:54:34+00	2025-07-21 04:54:34+00
4101	1e7663c4-11f8-4a1e-9170-d545a9577ab2	nl	Indie Brand: Mossbadger	2025-07-21 04:54:34+00	2025-07-21 04:54:34+00
4102	cc17bf61-859d-48c2-b884-e96b8e1b5c4c	en	Indie Brand: Rainey Regalia	2025-08-15 13:14:36+00	2025-08-15 13:14:36+00
4103	cc17bf61-859d-48c2-b884-e96b8e1b5c4c	fr	Marque Indépendante : Rainey Regalia	2025-08-15 13:14:36+00	2025-08-15 13:14:36+00
4104	cc17bf61-859d-48c2-b884-e96b8e1b5c4c	it	Brand Indie: Rainey Regalia	2025-08-15 13:14:36+00	2025-08-15 13:14:36+00
4105	cc17bf61-859d-48c2-b884-e96b8e1b5c4c	nb_NO	Indie Brand: Rainey Regalia	2025-08-15 13:14:36+00	2025-08-15 13:14:36+00
4106	cc17bf61-859d-48c2-b884-e96b8e1b5c4c	nl	Indie Brand: Rainey Regalia	2025-08-15 13:14:36+00	2025-08-15 13:14:36+00
4107	cffc74ed-433f-47fe-afa6-f92e09fe1a24	en	Indie Brand: Lily of the Valley	2025-08-16 02:22:50+00	2025-08-16 02:22:50+00
4108	cffc74ed-433f-47fe-afa6-f92e09fe1a24	fr	Marque Indépendante : Lily of the Valley	2025-08-16 02:22:50+00	2025-08-16 02:22:50+00
4109	cffc74ed-433f-47fe-afa6-f92e09fe1a24	it	Brand Indie: Lily of the Valley	2025-08-16 02:22:50+00	2025-08-16 02:22:50+00
4110	cffc74ed-433f-47fe-afa6-f92e09fe1a24	nb_NO	Indie Brand: Lily of the Valley	2025-08-16 02:22:50+00	2025-08-16 02:22:50+00
4111	cffc74ed-433f-47fe-afa6-f92e09fe1a24	nl	Indie Brand: Lily of the Valley	2025-08-16 02:22:50+00	2025-08-16 02:22:50+00
4112	a5d19638-8b0b-4ece-acef-6aeaaa93d630	en	Sub-Line: Citanul	2025-10-19 23:37:26+00	2025-10-19 23:37:26+00
4113	a5d19638-8b0b-4ece-acef-6aeaaa93d630	fr	Sous-marque : Citanul	2025-10-19 23:37:26+00	2025-10-19 23:37:26+00
4114	a5d19638-8b0b-4ece-acef-6aeaaa93d630	it	Sottobrand: Citanul	2025-10-19 23:37:26+00	2025-10-19 23:37:26+00
4115	a5d19638-8b0b-4ece-acef-6aeaaa93d630	nl	Submerk: Citanul	2025-10-19 23:37:26+00	2025-10-19 23:37:26+00
4116	a5d19638-8b0b-4ece-acef-6aeaaa93d630	nb_NO	Sub-Line: Citanul	2025-10-19 23:37:26+00	2025-10-19 23:37:26+00
153	df668af3-5c82-4a25-8076-bd053d8798cd	en	Motif: Umbrellas	\N	2026-01-04 01:00:10+00
102	54b3df74-269f-40ba-adfc-dc8c19aca53a	en	Angels/Cherubs	\N	2026-01-04 01:48:47+00
1114	54b3df74-269f-40ba-adfc-dc8c19aca53a	fr	Anges/Chérubins	\N	2026-01-04 01:49:25+00
2283	54b3df74-269f-40ba-adfc-dc8c19aca53a	nl	Engelen/Engeltjes	\N	2026-01-04 01:49:25+00
3344	54b3df74-269f-40ba-adfc-dc8c19aca53a	it	Angeli/Cherubini	\N	2026-01-04 01:49:25+00
4117	75e0fde4-da03-46b0-8933-71f37df9e1bc	en	Sub-Line: FRILL	2026-01-04 02:39:47+00	2026-01-04 02:39:47+00
4118	75e0fde4-da03-46b0-8933-71f37df9e1bc	fr	Sous-marque : FRILL	2026-01-04 02:39:47+00	2026-01-04 02:39:47+00
4119	75e0fde4-da03-46b0-8933-71f37df9e1bc	it	Sottobrand: FRILL	2026-01-04 02:39:47+00	2026-01-04 02:39:47+00
4120	75e0fde4-da03-46b0-8933-71f37df9e1bc	nl	Submerk: FRILL	2026-01-04 02:39:47+00	2026-01-04 02:39:47+00
4122	c27916ee-781d-4113-9edb-0c543d151176	en	Item: Mirror	2026-01-21 17:37:52+00	2026-01-21 17:37:52+00
4123	1e78899d-ec72-48e8-a9ba-06a575901cd9	en	Detail: Feathers	2026-01-21 17:41:48+00	2026-01-21 17:41:48+00
4124	9f233f03-23ea-4a43-80ed-1dc6cc147bf5	en	Bread/Pastries	2026-01-22 23:29:46+00	2026-01-22 23:29:46+00
4125	9f233f03-23ea-4a43-80ed-1dc6cc147bf5	fr	Pain/Pâtisseries	2026-01-22 23:29:46+00	2026-01-22 23:29:46+00
4126	9f233f03-23ea-4a43-80ed-1dc6cc147bf5	it	Pane/Pasticcini	2026-01-22 23:29:46+00	2026-01-22 23:29:46+00
4127	9f233f03-23ea-4a43-80ed-1dc6cc147bf5	nl	Brood	2026-01-22 23:29:46+00	2026-01-22 23:29:46+00
4128	9f233f03-23ea-4a43-80ed-1dc6cc147bf5	nb_NO	Brød	2026-01-22 23:29:46+00	2026-01-22 23:29:46+00
69	82d98b84-7ca4-49d7-b09c-39cbe93707cb	en	Motif: Jewels	\N	2026-02-07 02:41:58+00
1105	82d98b84-7ca4-49d7-b09c-39cbe93707cb	fr	Motif : Joyaux	\N	2026-02-07 02:41:58+00
2327	adf4de04-f73d-4e59-884b-54b0661a7f01	nl	Detail: Strass steentjes/Juwelen	\N	2026-02-07 02:45:55+00
4129	e79bf65d-9e51-4ee5-91bc-1301b1159220	en	Item: Keychain	2026-02-07 03:25:15+00	2026-02-07 03:25:15+00
4130	e79bf65d-9e51-4ee5-91bc-1301b1159220	fr	Article : Porte-clés	2026-02-07 03:25:15+00	2026-02-07 03:25:15+00
4131	e79bf65d-9e51-4ee5-91bc-1301b1159220	it	Oggetto: Portachiavi	2026-02-07 03:25:15+00	2026-02-07 03:25:15+00
4132	e79bf65d-9e51-4ee5-91bc-1301b1159220	nl	Type: Nøkkelring	2026-02-07 03:25:15+00	2026-02-07 03:25:15+00
4133	cd6ec9da-f13a-4587-a7df-b43cbefd3f35	en	Indie Brand: And Romeo	2026-02-07 04:23:00+00	2026-02-07 04:23:00+00
4134	cd6ec9da-f13a-4587-a7df-b43cbefd3f35	fr	Marque Indépendante : And Romeo	2026-02-07 04:23:00+00	2026-02-07 04:23:00+00
4135	cd6ec9da-f13a-4587-a7df-b43cbefd3f35	it	Brand Indie: And Romeo	2026-02-07 04:23:00+00	2026-02-07 04:23:00+00
4136	cd6ec9da-f13a-4587-a7df-b43cbefd3f35	nb_NO	Indie Brand: And Romeo	2026-02-07 04:23:00+00	2026-02-07 04:23:00+00
4137	cd6ec9da-f13a-4587-a7df-b43cbefd3f35	nl	Indie Brand: And Romeo	2026-02-07 04:23:00+00	2026-02-07 04:23:00+00
4138	ed56a3dc-6ae4-4e83-ae1c-5a9657c024d6	en	Motif: Beads/Pearls	2026-03-30 16:42:03+00	2026-03-30 16:42:03+00
4139	4967fcc9-56b0-4711-860d-06798229e095	en	Indie Brand: Loveliness Studio	2026-04-22 02:42:24+00	2026-04-22 02:42:24+00
4140	4967fcc9-56b0-4711-860d-06798229e095	fr	Marque Indépendante : Loveliness Studio	2026-04-22 02:42:24+00	2026-04-22 02:42:24+00
4141	4967fcc9-56b0-4711-860d-06798229e095	it	Brand Indie: Loveliness Studio	2026-04-22 02:42:24+00	2026-04-22 02:42:24+00
4142	4967fcc9-56b0-4711-860d-06798229e095	nb_NO	Indie Brand: Loveliness Studio	2026-04-22 02:42:24+00	2026-04-22 02:42:24+00
4143	4967fcc9-56b0-4711-860d-06798229e095	nl	Indie Brand: Loveliness Studio	2026-04-22 02:42:24+00	2026-04-22 02:42:24+00
4144	e11f41ef-e9a7-4574-ae35-bfefb00c54fc	en	Indie Brand: Amavel	2026-04-22 03:03:03+00	2026-04-22 03:03:03+00
4145	e11f41ef-e9a7-4574-ae35-bfefb00c54fc	fr	Marque Indépendante : Amavel	2026-04-22 03:03:04+00	2026-04-22 03:03:04+00
4146	e11f41ef-e9a7-4574-ae35-bfefb00c54fc	it	Brand Indie: Amavel	2026-04-22 03:03:04+00	2026-04-22 03:03:04+00
4147	e11f41ef-e9a7-4574-ae35-bfefb00c54fc	nl	Indie Brand: Amavel	2026-04-22 03:03:04+00	2026-04-22 03:03:04+00
4148	e11f41ef-e9a7-4574-ae35-bfefb00c54fc	nb_NO	Indie Brand: Amavel	2026-04-22 03:03:04+00	2026-04-22 03:03:04+00
4153	eef94723-6994-4e53-b3c1-bb6149d5fe6c	en	Sub-Line: Peace Now	2026-04-22 03:10:32+00	2026-04-22 03:10:32+00
4154	eef94723-6994-4e53-b3c1-bb6149d5fe6c	fr	Sous-marque : Peace Now	2026-04-22 03:10:57+00	2026-04-22 03:10:57+00
4155	eef94723-6994-4e53-b3c1-bb6149d5fe6c	it	Sottobrand: Peace Now	2026-04-22 03:10:57+00	2026-04-22 03:10:57+00
4156	eef94723-6994-4e53-b3c1-bb6149d5fe6c	nb_NO	Sub-Line: Peace Now	2026-04-22 03:10:57+00	2026-04-22 03:10:57+00
4157	eef94723-6994-4e53-b3c1-bb6149d5fe6c	nl	Submerk: Peace Now	2026-04-22 03:10:57+00	2026-04-22 03:10:57+00
4158	c3ae7c35-17dd-4f68-a26d-8a9bbc4ec32b	en	Indie Brand: Sleepyland	2026-04-22 04:00:18+00	2026-04-22 04:00:18+00
4159	c3ae7c35-17dd-4f68-a26d-8a9bbc4ec32b	nl	Indie Brand: Sleepyland	2026-04-22 04:00:18+00	2026-04-22 04:00:18+00
4160	c3ae7c35-17dd-4f68-a26d-8a9bbc4ec32b	nb_NO	Indie Brand: Sleepyland	2026-04-22 04:00:18+00	2026-04-22 04:00:18+00
4161	c3ae7c35-17dd-4f68-a26d-8a9bbc4ec32b	it	Brand Indie: Sleepyland	2026-04-22 04:00:18+00	2026-04-22 04:00:18+00
4162	c3ae7c35-17dd-4f68-a26d-8a9bbc4ec32b	fr	Marque Indépendante : Sleepyland	2026-04-22 04:00:18+00	2026-04-22 04:00:18+00
4163	bf7128fa-49a8-4f48-9edc-b7f46f7ef729	en	Indie Brand: Angel Fish	2026-06-10 02:06:54+00	2026-06-10 02:06:54+00
4164	bf7128fa-49a8-4f48-9edc-b7f46f7ef729	fr	Marque Indépendante : Angel Fish	2026-06-10 02:06:54+00	2026-06-10 02:06:54+00
4165	bf7128fa-49a8-4f48-9edc-b7f46f7ef729	nb_NO	Indie Brand: Angel Fish	2026-06-10 02:06:54+00	2026-06-10 02:06:54+00
4166	bf7128fa-49a8-4f48-9edc-b7f46f7ef729	nl	Indie Brand: Angel Fish	2026-06-10 02:06:54+00	2026-06-10 02:06:54+00
4167	bf7128fa-49a8-4f48-9edc-b7f46f7ef729	it	Brand Indie: Angel Fish	2026-06-10 02:06:54+00	2026-06-10 02:06:54+00
4168	662a3f2f-9bbe-4714-a4e7-c4a434fd582f	en	Indie Brand: Le Carrousel	2026-06-10 02:08:24+00	2026-06-10 02:08:24+00
4169	662a3f2f-9bbe-4714-a4e7-c4a434fd582f	fr	Marque Indépendante : Le Carrousel	2026-06-10 02:08:24+00	2026-06-10 02:08:24+00
4170	662a3f2f-9bbe-4714-a4e7-c4a434fd582f	it	Brand Indie: Le Carrousel	2026-06-10 02:08:24+00	2026-06-10 02:08:24+00
4171	662a3f2f-9bbe-4714-a4e7-c4a434fd582f	nb_NO	Indie Brand: Le Carrousel	2026-06-10 02:08:24+00	2026-06-10 02:08:24+00
4172	662a3f2f-9bbe-4714-a4e7-c4a434fd582f	nl	Indie Brand: Le Carrousel	2026-06-10 02:08:24+00	2026-06-10 02:08:24+00
4173	7c81a0d2-29ad-4846-9348-818ca2561526	en	Indie Brand: Plushii Kawaii	2026-06-10 02:10:17+00	2026-06-10 02:10:17+00
4174	7c81a0d2-29ad-4846-9348-818ca2561526	fr	Marque Indépendante : Plushii Kawaii	2026-06-10 02:10:17+00	2026-06-10 02:10:17+00
4175	7c81a0d2-29ad-4846-9348-818ca2561526	it	Brand Indie: Plushii Kawaii	2026-06-10 02:10:17+00	2026-06-10 02:10:17+00
4176	7c81a0d2-29ad-4846-9348-818ca2561526	nb_NO	Indie Brand: Plushii Kawaii	2026-06-10 02:10:17+00	2026-06-10 02:10:17+00
4177	7c81a0d2-29ad-4846-9348-818ca2561526	nl	Indie Brand: Plushii Kawaii	2026-06-10 02:10:17+00	2026-06-10 02:10:17+00
4178	cafee464-b8bb-4ad5-baa4-1b72ae50a678	en	Indie Brand: Whimsy Kei	2026-06-10 02:23:33+00	2026-06-10 02:23:33+00
4179	cafee464-b8bb-4ad5-baa4-1b72ae50a678	fr	Marque Indépendante : Whimsy Kei	2026-06-10 02:23:33+00	2026-06-10 02:23:33+00
4180	cafee464-b8bb-4ad5-baa4-1b72ae50a678	it	Brand Indie: Whimsy Kei	2026-06-10 02:23:33+00	2026-06-10 02:23:33+00
4181	cafee464-b8bb-4ad5-baa4-1b72ae50a678	nb_NO	Indie Brand: Whimsy Kei	2026-06-10 02:23:33+00	2026-06-10 02:23:33+00
4182	cafee464-b8bb-4ad5-baa4-1b72ae50a678	nl	Indie Brand: Whimsy Kei	2026-06-10 02:23:33+00	2026-06-10 02:23:33+00
4183	b80f4c2c-acab-48b0-b7bf-ff90b418f4a8	en	Indie Brand: Sugarstar Cafe	2026-06-10 02:31:24+00	2026-06-10 02:31:24+00
4184	b80f4c2c-acab-48b0-b7bf-ff90b418f4a8	fr	Marque Indépendante : Sugarstar Cafe	2026-06-10 02:31:24+00	2026-06-10 02:31:24+00
4185	b80f4c2c-acab-48b0-b7bf-ff90b418f4a8	it	Brand Indie: Sugarstar Cafe	2026-06-10 02:31:24+00	2026-06-10 02:31:24+00
4186	b80f4c2c-acab-48b0-b7bf-ff90b418f4a8	nb_NO	Indie Brand: Sugarstar Cafe	2026-06-10 02:31:24+00	2026-06-10 02:31:24+00
4187	b80f4c2c-acab-48b0-b7bf-ff90b418f4a8	nl	Indie Brand: Sugarstar Cafe	2026-06-10 02:31:24+00	2026-06-10 02:31:24+00
4188	c12fa34d-10b4-4bc5-b830-ab6f8fb14c27	en	Sub-Line: Dangerous Nude	2026-06-10 03:01:45+00	2026-06-10 03:01:45+00
4189	c12fa34d-10b4-4bc5-b830-ab6f8fb14c27	nl	Submerk: Dangerous Nude	2026-06-10 03:01:45+00	2026-06-10 03:01:45+00
4190	c12fa34d-10b4-4bc5-b830-ab6f8fb14c27	nb_NO	Sub-Line: Dangerous Nude	2026-06-10 03:01:45+00	2026-06-10 03:01:45+00
4191	c12fa34d-10b4-4bc5-b830-ab6f8fb14c27	it	Sub-Line: Dangerous Nude	2026-06-10 03:01:45+00	2026-06-10 03:01:45+00
4192	c12fa34d-10b4-4bc5-b830-ab6f8fb14c27	fr	Sous-marque : Dangerous Nude	2026-06-10 03:01:45+00	2026-06-10 03:01:45+00
85	bb2b6a63-aa52-4235-bd8f-21e332d0994e	en	Detail: Knitted/Crocheted	\N	2026-06-10 03:04:40+00
9	677ac1d2-3bed-40fd-8bb5-74dfbce18f88	en	Motif: Jewelry	\N	2026-06-10 03:06:22+00
1045	677ac1d2-3bed-40fd-8bb5-74dfbce18f88	fr	Motif : Bijoux	\N	2026-06-10 03:06:22+00
3454	677ac1d2-3bed-40fd-8bb5-74dfbce18f88	it	Motivo: Gioielli	\N	2026-06-10 03:06:22+00
2214	677ac1d2-3bed-40fd-8bb5-74dfbce18f88	nl	Motief: Sieraden	\N	2026-06-10 03:06:22+00
\.


--
-- Name: attribute_translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.attribute_translations_id_seq', 329, true);


--
-- Name: brand_translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.brand_translations_id_seq', 649, true);


--
-- Name: category_translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.category_translations_id_seq', 270, true);


--
-- Name: color_translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.color_translations_id_seq', 376, true);


--
-- Name: feature_translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.feature_translations_id_seq', 620, true);


--
-- Name: tag_translations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: laravel
--

SELECT pg_catalog.setval('public.tag_translations_id_seq', 4192, true);


--
-- PostgreSQL database dump complete
--

\unrestrict PemEy47ugV4lu5Qz9tMYckJnejDPkuS9GaFfVJjJr3aqPZn8jSJVqdlnvARKfKd

