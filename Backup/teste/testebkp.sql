PGDMP  6    ,                |            teste    16.1    16.1     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    19174    teste    DATABASE     |   CREATE DATABASE teste WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE teste;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                pg_database_owner    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   pg_database_owner    false    4            �            1259    19175    cliente    TABLE       CREATE TABLE public.cliente (
    codcli character(3) NOT NULL,
    nome character varying(40) NOT NULL,
    endereco character varying(50) NOT NULL,
    cidade character varying(20) NOT NULL,
    estado character(2) NOT NULL,
    cep character(9) NOT NULL
);
    DROP TABLE public.cliente;
       public         heap    postgres    false    4            �            1259    19180    venda    TABLE     �   CREATE TABLE public.venda (
    duplic character(6) NOT NULL,
    valor numeric(10,2) NOT NULL,
    vencto date NOT NULL,
    codcli character(3) NOT NULL
);
    DROP TABLE public.venda;
       public         heap    postgres    false    4                       2606    19179    cliente cliente_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (codcli);
 >   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_pkey;
       public            postgres    false    215            !           2606    19184    venda venda_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.venda
    ADD CONSTRAINT venda_pkey PRIMARY KEY (duplic);
 :   ALTER TABLE ONLY public.venda DROP CONSTRAINT venda_pkey;
       public            postgres    false    216                       1259    19190    idx_codcli_venda    INDEX     D   CREATE INDEX idx_codcli_venda ON public.venda USING btree (codcli);
 $   DROP INDEX public.idx_codcli_venda;
       public            postgres    false    216            "           2606    19185    venda venda_codcli_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY public.venda
    ADD CONSTRAINT venda_codcli_fkey FOREIGN KEY (codcli) REFERENCES public.cliente(codcli);
 A   ALTER TABLE ONLY public.venda DROP CONSTRAINT venda_codcli_fkey;
       public          postgres    false    215    216    4638           