PGDMP  *                    |            agencia_carros_b    16.1    16.1 A               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            	           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            
           1262    19225    agencia_carros_b    DATABASE     �   CREATE DATABASE agencia_carros_b WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Portuguese_Brazil.1252';
     DROP DATABASE agencia_carros_b;
                postgres    false            �            1259    19226    agencia    TABLE     �   CREATE TABLE public.agencia (
    num_agencia character varying(255) NOT NULL,
    endereco character varying(255) NOT NULL,
    contato character varying(255) NOT NULL,
    cidade character varying(255) NOT NULL
);
    DROP TABLE public.agencia;
       public         heap    postgres    false            �            1259    19300    aluga    TABLE     �   CREATE TABLE public.aluga (
    data_fim date NOT NULL,
    data_inicio date NOT NULL,
    id_aluguel integer NOT NULL,
    valor_total numeric(10,2) NOT NULL,
    id_carro integer NOT NULL,
    id_cliente integer NOT NULL
);
    DROP TABLE public.aluga;
       public         heap    postgres    false            �            1259    19299    aluga_id_aluguel_seq    SEQUENCE     �   CREATE SEQUENCE public.aluga_id_aluguel_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.aluga_id_aluguel_seq;
       public          postgres    false    229                       0    0    aluga_id_aluguel_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.aluga_id_aluguel_seq OWNED BY public.aluga.id_aluguel;
          public          postgres    false    228            �            1259    19245    carros    TABLE     �  CREATE TABLE public.carros (
    marca character varying(255) NOT NULL,
    modelo character varying(255) NOT NULL,
    ano integer NOT NULL,
    placa character varying(255) NOT NULL,
    status character varying(255) NOT NULL,
    id_carro integer NOT NULL,
    cor character varying(255) NOT NULL,
    valor_carro numeric(10,2),
    disponibilidade character varying(255) DEFAULT 'DISPONIVEL'::character varying,
    num_agencia character varying(5)
);
    DROP TABLE public.carros;
       public         heap    postgres    false            �            1259    19244    carros_id_carro_seq    SEQUENCE     �   CREATE SEQUENCE public.carros_id_carro_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.carros_id_carro_seq;
       public          postgres    false    219                       0    0    carros_id_carro_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.carros_id_carro_seq OWNED BY public.carros.id_carro;
          public          postgres    false    218            �            1259    19235    clientes    TABLE     o  CREATE TABLE public.clientes (
    telefone character varying(255) NOT NULL,
    nome character varying(255) NOT NULL,
    cnh character varying(255) NOT NULL,
    id_cliente integer NOT NULL,
    cidade character varying(255) NOT NULL,
    estado character varying(255) NOT NULL,
    sobrenome character varying(255) NOT NULL,
    endereco character varying(255)
);
    DROP TABLE public.clientes;
       public         heap    postgres    false            �            1259    19233    clientes_id_cliente_seq    SEQUENCE     �   CREATE SEQUENCE public.clientes_id_cliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.clientes_id_cliente_seq;
       public          postgres    false    217                       0    0    clientes_id_cliente_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.clientes_id_cliente_seq OWNED BY public.clientes.id_cliente;
          public          postgres    false    216            �            1259    19291    feedback    TABLE     �   CREATE TABLE public.feedback (
    id_feedback integer NOT NULL,
    comentario character varying(255) NOT NULL,
    avaliacao character varying(255) NOT NULL,
    id_carro integer
);
    DROP TABLE public.feedback;
       public         heap    postgres    false            �            1259    19290    feedback_id_feedback_seq    SEQUENCE     �   CREATE SEQUENCE public.feedback_id_feedback_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.feedback_id_feedback_seq;
       public          postgres    false    227                       0    0    feedback_id_feedback_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.feedback_id_feedback_seq OWNED BY public.feedback.id_feedback;
          public          postgres    false    226            �            1259    19546    forma_pagamento    TABLE       CREATE TABLE public.forma_pagamento (
    id_forma_pagamento integer NOT NULL,
    forma_pagamento character varying(255) NOT NULL,
    nome_titular character varying(255) NOT NULL,
    numero_cartao character varying(255) NOT NULL,
    cnh character varying(255)
);
 #   DROP TABLE public.forma_pagamento;
       public         heap    postgres    false            �            1259    19545 &   forma_pagamento_id_forma_pagamento_seq    SEQUENCE     �   CREATE SEQUENCE public.forma_pagamento_id_forma_pagamento_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE public.forma_pagamento_id_forma_pagamento_seq;
       public          postgres    false    232                       0    0 &   forma_pagamento_id_forma_pagamento_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE public.forma_pagamento_id_forma_pagamento_seq OWNED BY public.forma_pagamento.id_forma_pagamento;
          public          postgres    false    231            �            1259    19254    funcionarios    TABLE     !  CREATE TABLE public.funcionarios (
    id_funcionario integer NOT NULL,
    nome_funcionario character varying(255) NOT NULL,
    cargo_funcionario character varying(255) NOT NULL,
    salario_funcionario character varying(255) NOT NULL,
    num_agencia character varying(255) NOT NULL
);
     DROP TABLE public.funcionarios;
       public         heap    postgres    false            �            1259    19253    funcionarios_id_funcionario_seq    SEQUENCE     �   CREATE SEQUENCE public.funcionarios_id_funcionario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.funcionarios_id_funcionario_seq;
       public          postgres    false    221                       0    0    funcionarios_id_funcionario_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.funcionarios_id_funcionario_seq OWNED BY public.funcionarios.id_funcionario;
          public          postgres    false    220            �            1259    19277 
   manutencao    TABLE     R  CREATE TABLE public.manutencao (
    id_manutencao integer NOT NULL,
    data_manutencao character varying(255) NOT NULL,
    tipo_manutencao character varying(255) NOT NULL,
    descricao character varying(255) NOT NULL,
    km character varying(255) NOT NULL,
    custo character varying(255) NOT NULL,
    id_carro integer NOT NULL
);
    DROP TABLE public.manutencao;
       public         heap    postgres    false            �            1259    19276    manutencao_id_manutencao_seq    SEQUENCE     �   CREATE SEQUENCE public.manutencao_id_manutencao_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.manutencao_id_manutencao_seq;
       public          postgres    false    225                       0    0    manutencao_id_manutencao_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.manutencao_id_manutencao_seq OWNED BY public.manutencao.id_manutencao;
          public          postgres    false    224            �            1259    19268 	   pagamento    TABLE     H  CREATE TABLE public.pagamento (
    id_pagamento integer NOT NULL,
    valor numeric(7,2) NOT NULL,
    status_pagamento character varying(255) NOT NULL,
    data_pagamento character varying(255) NOT NULL,
    id_registro integer NOT NULL,
    comprovante character varying(255) NOT NULL,
    forma_pagament integer NOT NULL
);
    DROP TABLE public.pagamento;
       public         heap    postgres    false            �            1259    19267    pagamento_id_pagamento_seq    SEQUENCE     �   CREATE SEQUENCE public.pagamento_id_pagamento_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.pagamento_id_pagamento_seq;
       public          postgres    false    223                       0    0    pagamento_id_pagamento_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.pagamento_id_pagamento_seq OWNED BY public.pagamento.id_pagamento;
          public          postgres    false    222            �            1259    19316    registra    TABLE     d   CREATE TABLE public.registra (
    id_cliente integer NOT NULL,
    id_feedback integer NOT NULL
);
    DROP TABLE public.registra;
       public         heap    postgres    false            �            1259    19572    reservas    TABLE     �   CREATE TABLE public.reservas (
    id_reserva integer NOT NULL,
    data_reserva date NOT NULL,
    data_devolucao date NOT NULL,
    id_carro integer NOT NULL,
    id_cliente integer NOT NULL,
    status_reserva character varying(50) NOT NULL
);
    DROP TABLE public.reservas;
       public         heap    postgres    false            �            1259    19571    reservas_id_reserva_seq    SEQUENCE     �   CREATE SEQUENCE public.reservas_id_reserva_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.reservas_id_reserva_seq;
       public          postgres    false    234                       0    0    reservas_id_reserva_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.reservas_id_reserva_seq OWNED BY public.reservas.id_reserva;
          public          postgres    false    233            Q           2604    19303    aluga id_aluguel    DEFAULT     t   ALTER TABLE ONLY public.aluga ALTER COLUMN id_aluguel SET DEFAULT nextval('public.aluga_id_aluguel_seq'::regclass);
 ?   ALTER TABLE public.aluga ALTER COLUMN id_aluguel DROP DEFAULT;
       public          postgres    false    229    228    229            K           2604    19248    carros id_carro    DEFAULT     r   ALTER TABLE ONLY public.carros ALTER COLUMN id_carro SET DEFAULT nextval('public.carros_id_carro_seq'::regclass);
 >   ALTER TABLE public.carros ALTER COLUMN id_carro DROP DEFAULT;
       public          postgres    false    219    218    219            J           2604    19238    clientes id_cliente    DEFAULT     z   ALTER TABLE ONLY public.clientes ALTER COLUMN id_cliente SET DEFAULT nextval('public.clientes_id_cliente_seq'::regclass);
 B   ALTER TABLE public.clientes ALTER COLUMN id_cliente DROP DEFAULT;
       public          postgres    false    216    217    217            P           2604    19294    feedback id_feedback    DEFAULT     |   ALTER TABLE ONLY public.feedback ALTER COLUMN id_feedback SET DEFAULT nextval('public.feedback_id_feedback_seq'::regclass);
 C   ALTER TABLE public.feedback ALTER COLUMN id_feedback DROP DEFAULT;
       public          postgres    false    227    226    227            R           2604    19549 "   forma_pagamento id_forma_pagamento    DEFAULT     �   ALTER TABLE ONLY public.forma_pagamento ALTER COLUMN id_forma_pagamento SET DEFAULT nextval('public.forma_pagamento_id_forma_pagamento_seq'::regclass);
 Q   ALTER TABLE public.forma_pagamento ALTER COLUMN id_forma_pagamento DROP DEFAULT;
       public          postgres    false    231    232    232            M           2604    19257    funcionarios id_funcionario    DEFAULT     �   ALTER TABLE ONLY public.funcionarios ALTER COLUMN id_funcionario SET DEFAULT nextval('public.funcionarios_id_funcionario_seq'::regclass);
 J   ALTER TABLE public.funcionarios ALTER COLUMN id_funcionario DROP DEFAULT;
       public          postgres    false    220    221    221            O           2604    19280    manutencao id_manutencao    DEFAULT     �   ALTER TABLE ONLY public.manutencao ALTER COLUMN id_manutencao SET DEFAULT nextval('public.manutencao_id_manutencao_seq'::regclass);
 G   ALTER TABLE public.manutencao ALTER COLUMN id_manutencao DROP DEFAULT;
       public          postgres    false    225    224    225            N           2604    19271    pagamento id_pagamento    DEFAULT     �   ALTER TABLE ONLY public.pagamento ALTER COLUMN id_pagamento SET DEFAULT nextval('public.pagamento_id_pagamento_seq'::regclass);
 E   ALTER TABLE public.pagamento ALTER COLUMN id_pagamento DROP DEFAULT;
       public          postgres    false    223    222    223            S           2604    19575    reservas id_reserva    DEFAULT     z   ALTER TABLE ONLY public.reservas ALTER COLUMN id_reserva SET DEFAULT nextval('public.reservas_id_reserva_seq'::regclass);
 B   ALTER TABLE public.reservas ALTER COLUMN id_reserva DROP DEFAULT;
       public          postgres    false    233    234    234            U           2606    19232    agencia agencia_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.agencia
    ADD CONSTRAINT agencia_pkey PRIMARY KEY (num_agencia);
 >   ALTER TABLE ONLY public.agencia DROP CONSTRAINT agencia_pkey;
       public            postgres    false    215            e           2606    19305    aluga aluga_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.aluga
    ADD CONSTRAINT aluga_pkey PRIMARY KEY (id_aluguel);
 :   ALTER TABLE ONLY public.aluga DROP CONSTRAINT aluga_pkey;
       public            postgres    false    229            [           2606    19252    carros carros_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.carros
    ADD CONSTRAINT carros_pkey PRIMARY KEY (id_carro);
 <   ALTER TABLE ONLY public.carros DROP CONSTRAINT carros_pkey;
       public            postgres    false    219            W           2606    19243    clientes clientes_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id_cliente);
 @   ALTER TABLE ONLY public.clientes DROP CONSTRAINT clientes_pkey;
       public            postgres    false    217            Y           2606    19565    clientes cnh_unique 
   CONSTRAINT     M   ALTER TABLE ONLY public.clientes
    ADD CONSTRAINT cnh_unique UNIQUE (cnh);
 =   ALTER TABLE ONLY public.clientes DROP CONSTRAINT cnh_unique;
       public            postgres    false    217            c           2606    19298    feedback feedback_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.feedback
    ADD CONSTRAINT feedback_pkey PRIMARY KEY (id_feedback);
 @   ALTER TABLE ONLY public.feedback DROP CONSTRAINT feedback_pkey;
       public            postgres    false    227            g           2606    19558 $   forma_pagamento forma_pagamento_pkey 
   CONSTRAINT     r   ALTER TABLE ONLY public.forma_pagamento
    ADD CONSTRAINT forma_pagamento_pkey PRIMARY KEY (id_forma_pagamento);
 N   ALTER TABLE ONLY public.forma_pagamento DROP CONSTRAINT forma_pagamento_pkey;
       public            postgres    false    232            ]           2606    19261    funcionarios funcionarios_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.funcionarios
    ADD CONSTRAINT funcionarios_pkey PRIMARY KEY (id_funcionario);
 H   ALTER TABLE ONLY public.funcionarios DROP CONSTRAINT funcionarios_pkey;
       public            postgres    false    221            a           2606    19284    manutencao manutencao_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.manutencao
    ADD CONSTRAINT manutencao_pkey PRIMARY KEY (id_manutencao);
 D   ALTER TABLE ONLY public.manutencao DROP CONSTRAINT manutencao_pkey;
       public            postgres    false    225            _           2606    19275    pagamento pagamento_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.pagamento
    ADD CONSTRAINT pagamento_pkey PRIMARY KEY (id_pagamento);
 B   ALTER TABLE ONLY public.pagamento DROP CONSTRAINT pagamento_pkey;
       public            postgres    false    223            i           2606    19577    reservas reservas_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (id_reserva);
 @   ALTER TABLE ONLY public.reservas DROP CONSTRAINT reservas_pkey;
       public            postgres    false    234            o           2606    19306    aluga aluga_id_carro_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.aluga
    ADD CONSTRAINT aluga_id_carro_fkey FOREIGN KEY (id_carro) REFERENCES public.carros(id_carro);
 C   ALTER TABLE ONLY public.aluga DROP CONSTRAINT aluga_id_carro_fkey;
       public          postgres    false    4699    219    229            p           2606    19311    aluga aluga_id_cliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.aluga
    ADD CONSTRAINT aluga_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES public.clientes(id_cliente);
 E   ALTER TABLE ONLY public.aluga DROP CONSTRAINT aluga_id_cliente_fkey;
       public          postgres    false    229    4695    217            j           2606    19340    carros carros_num_agencia_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.carros
    ADD CONSTRAINT carros_num_agencia_fkey FOREIGN KEY (num_agencia) REFERENCES public.agencia(num_agencia);
 H   ALTER TABLE ONLY public.carros DROP CONSTRAINT carros_num_agencia_fkey;
       public          postgres    false    219    4693    215            s           2606    19566    forma_pagamento cnh    FK CONSTRAINT     r   ALTER TABLE ONLY public.forma_pagamento
    ADD CONSTRAINT cnh FOREIGN KEY (cnh) REFERENCES public.clientes(cnh);
 =   ALTER TABLE ONLY public.forma_pagamento DROP CONSTRAINT cnh;
       public          postgres    false    217    4697    232            n           2606    19345    feedback feedback_id_carro_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.feedback
    ADD CONSTRAINT feedback_id_carro_fkey FOREIGN KEY (id_carro) REFERENCES public.carros(id_carro);
 I   ALTER TABLE ONLY public.feedback DROP CONSTRAINT feedback_id_carro_fkey;
       public          postgres    false    219    227    4699            l           2606    19590    pagamento forma_pagamento_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.pagamento
    ADD CONSTRAINT forma_pagamento_fkey FOREIGN KEY (forma_pagament) REFERENCES public.forma_pagamento(id_forma_pagamento) NOT VALID;
 H   ALTER TABLE ONLY public.pagamento DROP CONSTRAINT forma_pagamento_fkey;
       public          postgres    false    223    232    4711            k           2606    19262 *   funcionarios funcionarios_num_agencia_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.funcionarios
    ADD CONSTRAINT funcionarios_num_agencia_fkey FOREIGN KEY (num_agencia) REFERENCES public.agencia(num_agencia);
 T   ALTER TABLE ONLY public.funcionarios DROP CONSTRAINT funcionarios_num_agencia_fkey;
       public          postgres    false    215    4693    221            m           2606    19285 #   manutencao manutencao_id_carro_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.manutencao
    ADD CONSTRAINT manutencao_id_carro_fkey FOREIGN KEY (id_carro) REFERENCES public.carros(id_carro);
 M   ALTER TABLE ONLY public.manutencao DROP CONSTRAINT manutencao_id_carro_fkey;
       public          postgres    false    225    4699    219            q           2606    19319 !   registra registra_id_cliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.registra
    ADD CONSTRAINT registra_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES public.clientes(id_cliente);
 K   ALTER TABLE ONLY public.registra DROP CONSTRAINT registra_id_cliente_fkey;
       public          postgres    false    217    230    4695            r           2606    19324 "   registra registra_id_feedback_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.registra
    ADD CONSTRAINT registra_id_feedback_fkey FOREIGN KEY (id_feedback) REFERENCES public.feedback(id_feedback);
 L   ALTER TABLE ONLY public.registra DROP CONSTRAINT registra_id_feedback_fkey;
       public          postgres    false    4707    227    230            t           2606    19578    reservas reservas_id_carro_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_id_carro_fkey FOREIGN KEY (id_carro) REFERENCES public.carros(id_carro);
 I   ALTER TABLE ONLY public.reservas DROP CONSTRAINT reservas_id_carro_fkey;
       public          postgres    false    219    234    4699            u           2606    19583 !   reservas reservas_id_cliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES public.clientes(id_cliente);
 K   ALTER TABLE ONLY public.reservas DROP CONSTRAINT reservas_id_cliente_fkey;
       public          postgres    false    234    4695    217           