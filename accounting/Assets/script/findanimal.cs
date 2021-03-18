using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public class findanimal : MonoBehaviour {
    public Image[] ani;//animal存放處
    public Image disable;
    public Button stock;
    public Color newColor;
    public Text[] msg = new Text[5];
    public Image[] lifebar = new Image[5];
    public string[] animal;
    IEnumerator ShowAniImg()
    {
       
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "find");
        form.AddField("userid", Savedata.id);
       
        WWW www = new WWW("http://163.17.135.213/accounting/FindAniImg.php", form);
        yield return www;
        string b;
        b = www.text;

        animal = b.Split(',');
        int i = 0;
        for (i = 0; i < Savedata.ani_category.Length; i++)
        {
            Savedata.ani_category[i] = animal[i];
          

        }
    }
    IEnumerator CollectionAniID()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "col");
        form.AddField("userid", Savedata.id);

        WWW www = new WWW("http://163.17.135.213/accounting/FindAniImg.php", form);
        yield return www;
        string b;
        b = www.text;

        string[] animal = b.Split(',');
        int i = 0;
        for (i = 0; i < animal.Length; i++)
        {
            Savedata.animal[i] = animal[i];
            StartCoroutine(SelectAniFeed(Savedata.animal[i], Savedata.id, i));
            print(Savedata.animal[i]);

        }
       
    }

    public IEnumerator SelectAniFeed(string aniID, string id, int i)
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "selectAni");
        form.AddField("ani1", aniID);
        form.AddField("userid", id);

        WWW www = new WWW("http://163.17.135.213/accounting/Feedtoani.php", form);
        yield return www;

        string b = www.text;
        if (Savedata.ani_category[i] == "1")
        {
            msg[i].text = "" + b+"/20";
            lifebar[i].fillAmount = float.Parse(b) / 20;
            if (float.Parse(b) >= 20)
            {
                ani[i].sprite = Resources.Load("chick_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[i] == "2")
        {
            msg[i].text = "" + b + "/30";
            lifebar[i].fillAmount = float.Parse(b) / 30;
            if (float.Parse(b) >= 30)
            {
               ani[i].sprite = Resources.Load("pig_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[i] == "3")
        {
            msg[i].text = "" + b + "/40";
            lifebar[i].fillAmount = float.Parse(b) / 40;
            if (float.Parse(b) >= 40)
            {
                ani[i].sprite = Resources.Load("ox_grow", typeof(Sprite)) as Sprite;
            }
        }

        //  Thread.Sleep(7000); //Delay 7秒
    }
    // Use this for initialization
    void Start()
    {
        int i;
        for (i = 0; i < 5; i++)
        {
            Savedata.animal[i] = "";
        }
        StartCoroutine(ShowAniImg());
        StartCoroutine(CollectionAniID());
        print("break");
    }
        // Update is called once per frame
        void Update () {


        
        int i = 0;
        String[] arr = new String[5];
        for (i = 0; i < Savedata.ani_category.Length; i++)
        {
            arr[i] = Savedata.ani_category[i];

        }
        for (i = 0; i < arr.Length; i++)
        {
            if (arr[i] == "1")
            {
                if ((lifebar[i].fillAmount*20) >= 20)
                {
                    ani[i].sprite = Resources.Load("chick_grow", typeof(Sprite)) as Sprite;
                }
                else
                {
                    ani[i].sprite = Resources.Load("chick", typeof(Sprite)) as Sprite;
                }
             
                ani[i].CrossFadeAlpha(1.0f, 1.0f, true);
                ani[i].gameObject.SetActive(true);
            }
            if (arr[i] == "2")
            {
                if ((lifebar[i].fillAmount * 30) >= 30)
                {
                    ani[i].sprite = Resources.Load("pig_grow", typeof(Sprite)) as Sprite;
                }
                else
                {
                    ani[i].sprite = Resources.Load("pig", typeof(Sprite)) as Sprite;
                }
              
                ani[i].CrossFadeAlpha(1.0f, 1.0f, true);
                ani[i].gameObject.SetActive(true);
            }
            if (arr[i] == "3")
            {
                if ((lifebar[i].fillAmount * 40) >= 40)
                {
                    ani[i].sprite = Resources.Load("ox_grow", typeof(Sprite)) as Sprite;
                }
                else
                {
                    ani[i].sprite = Resources.Load("ox", typeof(Sprite)) as Sprite;
                }
             
                ani[i].CrossFadeAlpha(1.0f, 1.0f, true);
                ani[i].gameObject.SetActive(true);
            }
            if (arr[i] =="" )
            {
                ani[i].sprite = Resources.Load("no", typeof(Sprite)) as Sprite;
                ani[i].gameObject.SetActive(false);
            }
            //if (animal.Length >= 5)
            //{
            //    disable.gameObject.SetActive(true);

            //    ColorBlock cb = stock.colors;
            //    cb.normalColor = Color.gray;
            //    stock.colors = cb;
            //}
            //else
            //{
            //    disable.gameObject.SetActive(false);
            //    ColorBlock cb = stock.colors;
            //    cb.normalColor = Color.white;
            //    stock.colors = cb;
            //}
        }
    }
}
